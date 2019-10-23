document.addEventListener("DOMContentLoaded", function () {
    async function saveLead(e) {
        console.log('ajaxurl');
        console.log(ajaxurl);
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
            console.log(data);
            console.log(response);
            const responseJson = await response.json();
            console.log(responseJson);
        }
        catch (err) {
            console.log(err);
        }
    }

    document.getElementById('form').addEventListener('submit', saveLead);
})