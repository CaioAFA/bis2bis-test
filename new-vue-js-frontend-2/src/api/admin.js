export const getAdmins = () => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Admin.php`;

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

export const deleteAdmin = (adminId) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Admin.php`;

    xhr.open("DELETE", url, false);

    xhr.withCredentials = true

    const payload = { id: adminId }

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

export const createAdmin = (name, email, password, canManagePosts, canManageUsers, canManageDumps) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Admin.php`;

    xhr.open("POST", url, false);

    xhr.withCredentials = true

    const payload = { name, email, password, canManagePosts, canManageUsers, canManageDumps }

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

export const editAdmin = (id, name, email, password, canManagePosts, canManageUsers, canManageDumps) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Admin.php`;

    xhr.open("PUT", url, false);

    xhr.withCredentials = true

    const payload = { id, name, email, password, canManagePosts, canManageUsers, canManageDumps }

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