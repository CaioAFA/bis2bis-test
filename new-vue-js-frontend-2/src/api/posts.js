export const getPosts = () => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Post.php`;

    xhr.open("GET", url, false);

    xhr.withCredentials = true

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          resolve(JSON.parse(this.response))
        } else {
          reject()
        }
      }
    };

    xhr.send();
  })
}

export const deletePost = (postId) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Post.php`;

    xhr.open("DELETE", url, false);

    xhr.withCredentials = true

    const payload = { id: postId }

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 204) {
          resolve()
        } else {
          reject()
        }
      }
    };

    xhr.send(JSON.stringify(payload));
  })
}
