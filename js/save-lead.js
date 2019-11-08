document.addEventListener("DOMContentLoaded", function () {

    async function saveLead(e) {
        e.preventDefault();
        try {
            serialize = function (obj) {
                var str = [];
                for (var p in obj)
                    if (obj.hasOwnProperty(p)) {
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    }
                return str.join("&");
            }

            const data = {
                action: 'save_lead',
                fullname: document.getElementById("fullname").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                company: document.getElementById("company").value,
                message: document.getElementById("message").value,
                consent: document.getElementById("consent").checked ? 1 : 0,
            };
            const response = await fetch(ajaxurl, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
                },
                body: serialize(data)
            });
            const responseJson = await response;
            //console.log(responseJson);
        }
        catch (err) {
            console.log(err);
        }
        
        downloadFile(fileDownloadUrl, fileDownloadName);
    }

    document.getElementById('form').addEventListener('submit', saveLead);
})