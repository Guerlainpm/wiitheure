/*let co = false;
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
function getPostSub() {
    if (co) {
        axios.post('/post/sub', {})
        .then(function (response) {
            
            
            postLayout(response.data);
        })
        .catch(function (error) {
        });
    }
}

function getNewPost() {
    axios.post('/post/new', {})
    .then(function (response) {
        postLayout(response.data);
    })
    .catch(function (error) {
    });
}
function getSub() {
    axios.post('/user/subs', {})
    .then(function (response) {
        rightSideLayout(document.getElementById("follow"), response.data);
    })
    .catch(function (error) {
    });
}
function rightSideLayout(container, data) {
    for (let i in data) {
        let li = document.createElement("LI");
        li.innerText = data[i].username;
        container.appendChild(li);
    }
}
function postLayout(posts) {
    document.getElementById("posts").innerHTML = "";
    for (let i in posts) {
        let post = posts[i];
        let container = document.createElement("DIV");
        if (i > 0) {
            container.className = "mt-2 bg-red-500 px-4 py-2 bg-blue-500 flex flex-col";
        } else {
            container.className = "bg-red-500 px-4 py-2 bg-blue-500 flex flex-col";
        }
        let header = document.createElement("DIV");
        let body = document.createElement("DIV");
        let footer = document.createElement("DIV");
        // header
        header.innerHTML = "<p class=\"\">" + post.username + "</p> <button>...</button>";
        header.className = "border-b border-grey";
        // ---
        // body
        body.innerHTML = "<p class=\"\">" + post.content + "</p>";
        body.className = "border-b border-grey";
        // ---
        // footer
        footer.innerHTML = "<p class=\"\">" + post.create_at + "</p>";
        // ---
        container.appendChild(header);
        container.appendChild(body);
        container.appendChild(footer);
        document.getElementById("posts").appendChild(container);
    }
}

document.getElementById("news").addEventListener("click", function () {
    document.getElementById("news").className = "ml-2 bg-blue-900 p-2 text-white ";
    document.getElementById("sub").className = "bg-blue-200 p-2 text-white ";
    getNewPost();
});

document.getElementById("sub").addEventListener("click", function () {
    document.getElementById("posts").innerHTML = "";
    document.getElementById("news").className = "ml-2 bg-blue-200 p-2 text-white ";
    document.getElementById("sub").className = "bg-blue-900 p-2 text-white ";
    if (co) {
        getPostSub();
    }
});

connected();

getSub();*/