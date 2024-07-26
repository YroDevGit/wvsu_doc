<?php
if(! function_exists("CY_PREVIEW_HLPER")){
    function CY_PREVIEW_HLPER($filepath, $inStorage = false){
        ?>
        <?php ?>

    <div id="previewcy">Loading...</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
        function showFile(filePath) {
            const fileExtension = filePath.split('.').pop().toLowerCase();

            if (fileExtension === 'docx') {
                fetch(filePath)
                    .then(response => response.arrayBuffer())
                    .then(data => mammoth.convertToHtml({ arrayBuffer: data }))
                    .then(result => {
                        document.getElementById('previewcy').innerHTML = result.value;
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('previewcy').innerText = 'There was an error processing the file.';
                    });
            } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                document.getElementById('previewcy').innerHTML = `<img src="${filePath}" alt="Image Preview">`;
            } else if (fileExtension === 'csv') {
                fetch(filePath)
                    .then(response => response.text())
                    .then(data => {
                        const parsedData = Papa.parse(data, { header: true });
                        const table = document.createElement('table');
                        table.className = 'cy-table';
                        const thead = document.createElement('thead');
                        const tbody = document.createElement('tbody');

                        // Create table headers
                        const headerRow = document.createElement('tr');
                        headerRow.className = 'cy-tr';
                        parsedData.meta.fields.forEach(header => {
                            const th = document.createElement('th');
                            th.className = 'cy-th';
                            th.textContent = header;
                            headerRow.appendChild(th);
                        });
                        thead.appendChild(headerRow);

                        // Create table rows
                        parsedData.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.className = 'cy-tr';
                            Object.values(row).forEach(cell => {
                                const td = document.createElement('td');
                                td.className = 'cy-td';
                                td.textContent = cell;
                                tr.appendChild(td);
                            });
                            tbody.appendChild(tr);
                        });

                        table.appendChild(thead);
                        table.appendChild(tbody);
                        document.getElementById('previewcy').innerHTML = '';
                        document.getElementById('previewcy').appendChild(table);
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('previewcy').innerText = 'There was an error processing the file.';
                    });
            } else if (['xls', 'xlsx'].includes(fileExtension)) {
                fetch(filePath)
                    .then(response => response.arrayBuffer())
                    .then(data => {
                        const workbook = XLSX.read(data, { type: 'array' });
                        const firstSheetName = workbook.SheetNames[0];
                        const worksheet = workbook.Sheets[firstSheetName];
                        const json = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

                        const table = document.createElement('table');
                        table.className = 'cy-table';
                        json.forEach((row, rowIndex) => {
                            const tr = document.createElement('tr');
                            tr.className = 'cy-tr';
                            row.forEach(cell => {
                                const cellElement = rowIndex === 0 ? document.createElement('th') : document.createElement('td');
                                cellElement.className = rowIndex === 0 ? 'cy-th' : 'cy-td';
                                cellElement.textContent = cell;
                                tr.appendChild(cellElement);
                            });
                            table.appendChild(tr);
                        });

                        document.getElementById('previewcy').innerHTML = '';
                        document.getElementById('previewcy').appendChild(table);
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('previewcy').innerText = 'There was an error processing the file.';
                    });
            } else if (['ppt', 'pptx'].includes(fileExtension)) {
                document.getElementById('previewcy').innerText = 'PowerPoint file preview is not supported yet.';
            } else {
                document.getElementById('previewcy').innerText = 'Unsupported file format.';
            }
        }

        // Example usage
       
        // To test with other files, replace the URL above with the file path you want to preview
    </script>
        <?php
    }
}
?>