<div x-data="records">
    <x-filament::button @click="exportAsCsv({{ Js::from($columns) }})">
        Export as CSV
    </x-filament::button>
    <x-filament::button @click="print({{ Js::from($columns) }})">
        Print
    </x-filament::button>
    <x-filament::button @click="copyToClipboard({{ Js::from($columns) }})">
        Copy to Clipboard
    </x-filament::button>


</div>


@script
<script type="text/javascript">
    Alpine.data('records', () => {
        return {
            title: "{{ $title }}",
            formattedData(data) {
                const formatter = new Intl.DateTimeFormat('en-GB', {
                    dateStyle: 'short',
                    timeStyle: 'short'
                })
                const columnToFormat = ['created_at', 'updated_at', 'start_date', 'end_date',
                    'date'
                ]
                return data.map((row) => {

                    return Object.values(row).map((value) => {
                        if (columnToFormat.includes(value)) {

                            return formatter.format(new Date(value))
                        }
                        return value
                    }).join(',')


                }).join('\n')
            },
            getPrintableTable(input) {

                return `<!DOCTYPE html>
                 <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <table>
                    <thead>
                        <tr>
                            ${Object.keys(input[0]).map((key) => `<th>${key}</th>`).join('')}
                        </tr>
                    </thead>
                    <tbody>
                        ${input.map((row) => `<tr>${Object.values(row).map((value) => `<td>${value}</td>`).join('')}</tr>`).join('')}
                    </tbody>
                </table>
            </body>
            </html>`

            },
            copyToClipboard(input) {


                const data = this.formattedData(input)

                navigator.clipboard.writeText(data)

                alert('Data copied to clipboard')


            },
            exportAsCsv(input) {
                const topRow = Object.keys(input).join(',')
                const data = `${topRow}\n${this.formattedData(input)}`
                const blob = new Blob([data], {
                    type: 'text/csv'
                })
                const url = URL.createObjectURL(blob)

                const a = document.createElement('a')
                a.href = url
                a.download = `${this.title}.csv`
                a.click()
                URL.revokeObjectURL(url)

            },


            print(input) {
                const html = this.getPrintableTable(input)

                const printWindow = window.open()
                printWindow.document.open()
                printWindow.document.write(html)
                printWindow.document.close()
                printWindow.print()
                // if print is done or cancelled close the window
                printWindow.close()

            }


        }

    })
</script>
@endscript
