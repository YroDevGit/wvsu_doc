function showFile(filePath, filetitle="", download=true, filenumber = null, filecode = null, filedetails=null) {
    if (filetitle === "") {
        document.getElementById('cy-preview-title').innerHTML = "";
    } else {
        document.getElementById('cy-preview-title').innerHTML = "[" + filetitle + "]";
    }

    if (download) {
        document.getElementById("download-button-cy-preview").style.display = '';
    } else {
        document.getElementById("download-button-cy-preview").style.display = 'none';
    }

    currentFileUrl = filePath; // Save the current file URL for downloading
    const fileExtension = filePath.split('.').pop().toLowerCase();
    if(filenumber!=null){
        document.getElementById("download-button-cy-preview").setAttribute("filenumber", filenumber);
    }
    if(filecode!=null){
        document.getElementById("download-button-cy-preview").setAttribute("filecode", filecode);
    }
    if(filedetails!=null){
        document.getElementById("download-button-cy-preview").setAttribute("filedetailes", filedetails);
    }
    document.getElementById('cy-preview-modal').style.display = "block";
    document.getElementById('previewcy').innerText = "Loading...";

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
                table.className = 'cy-table-preview';
                const thead = document.createElement('thead');
                const tbody = document.createElement('tbody');

                const headerRow = document.createElement('tr');
                parsedData.meta.fields.forEach(header => {
                    const th = document.createElement('th');
                    th.className = 'cy-th-preview';
                    th.textContent = header;
                    headerRow.appendChild(th);
                });
                thead.appendChild(headerRow);

                parsedData.data.forEach(row => {
                    const tr = document.createElement('tr');
                    Object.values(row).forEach(cell => {
                        const td = document.createElement('td');
                        td.className = 'cy-td-preview';
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
                table.className = 'cy-table-preview';
                json.forEach((row, rowIndex) => {
                    const tr = document.createElement('tr');
                    row.forEach(cell => {
                        const cellElement = rowIndex === 0 ? document.createElement('th') : document.createElement('td');
                        cellElement.className = rowIndex === 0 ? 'cy-th-preview' : 'cy-td-preview';
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
    } else if (fileExtension === 'pdf') {
        document.getElementById('previewcy').innerHTML = `<iframe src="${filePath}" width="100%" height="600px"></iframe>`;
    } else if (['ppt', 'pptx'].includes(fileExtension)) {
        document.getElementById('previewcy').innerText = 'PowerPoint file preview is not supported yet.';
    } else {
        document.getElementById('previewcy').innerText = 'Unsupported file format.';
    }
}

// Close the modal when the user clicks the close button
document.querySelector('.cy-close').onclick = function() {
    document.getElementById('cy-preview-modal').style.display = "none";
}


document.getElementById("download-button-cy-preview").addEventListener("click", function(){
    const link = document.createElement('a');
    link.href = currentFileUrl;
    link.download = ''; // Filename can be set if needed
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});
