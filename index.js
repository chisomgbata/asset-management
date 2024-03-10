Alpine.data('records', () => {
    return {
        title: "{{ $title }}",
        formatedData() {
            const formater = new Intl.DateTimeFormat('en-GB', {
                dateStyle: 'short',
                timeStyle: 'short'
            })
            const columnToFormat = ['created_at', 'updated_at', 'start_date', 'end_date',
                'date'
            ]
            return this.data.map((row) => {

                return Object.values(row).map((value) => {
                    if (columnToFormat.includes(value)) {

                        return formater.format(new Date(value))
                    }
                    return value
                }).join(',')





            }).join('\n')
        },
        copyToClipboard(data) {


            // const data = this.formatedData()

            // navigator.clipboard.writeText(data)

            // alert('Data copied to clipboard')

            alert(data.length)





        },
        exportAsCsv() {
            const topRow = Object.keys(this.data[0]).join(',')
            const data = `${topRow}\n${this.formatedData()}`
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
        print() {
            const data = this.formatedData()
            const html = `<!DOCTYPE html>
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
                            ${Object.keys(this.data[0]).map((key) => `<th>${key}</th>`).join('')}
                        </tr>
                    </thead>
                    <tbody>
                        ${this.data.map((row) => `<tr>${Object.values(row).map((value) => `<td>${value}</td>`).join('')}</tr>`).join('')}
                    </tbody>
                </table>
            </body>
            </html>`
            const printWindow = window.open()
            printWindow.document.open()
            printWindow.document.write(html)
            printWindow.document.close()
            printWindow.print()
            // if print is done or cancelled close the window
            printWindow.close()

        },
        watch: {
            data() {
                console.log('Data changed')
            }
        }
    }
})
