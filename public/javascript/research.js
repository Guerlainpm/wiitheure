let co = false;
function connected() {
    axios.post('/connected', {})
    .then(function (response) {
        co = response.data;
        getPostSub();
    })
    .catch(function (error) {
        //
    });
}

function postLayout(posts) {
    
    for (let i in posts.post) {
        let post = posts.post[i];
        console.log(post[0].created_at);
        
        let container = document.createElement("DIV");
        if (i > 0) {
            container.className = "mt-2 bg-red-500 px-4 py-2 bg-blue-500 flex flex-col";
        } else {
            container.className = "bg-red-500 px-4 py-2 bg-blue-500 flex flex-col";
        }
        let header = document.createElement("DIV");
        let body = document.createElement("DIV");
        let footer = document.createElement("DIV");
        header.className = "w-full";
        body.className = "w-full";
        footer.className = "w-full";
        header.innerHTML = "<p>" + /*post[0].App\\Models\\Wiitcontent: */"qlsqlsqlslqs"+ ":</p>"
        container.appendChild(header);
        container.appendChild(body);
        container.appendChild(footer);
        document.getElementById("posts").appendChild(container);
    }
}

function getPostSub() {
    if (co) {
        axios.post('/post/sub', {})
        .then(function (response) {
            postLayout(response.data);
        })
        .catch(function (error) {
            //console.log(error);
        });
    }
}

connected()
