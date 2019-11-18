
// Create an invisible a element with download attribute
// and click it, then remove it to not expose url
// Although, the URL can still be seen in the file properties.
export default function downloadFile(url, fileName) {
    const a = document.createElement("a");
    a.style.display = "none";
    document.body.appendChild(a);
    a.href = url;
    a.setAttribute("download", fileName);
    a.click();
    document.body.removeChild(a);
  }