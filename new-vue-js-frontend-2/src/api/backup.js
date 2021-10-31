export const getDumps = () => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Dumps.php`;

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

export const deleteDump = (filename) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Dumps.php`;

    xhr.open("DELETE", url, false);

    xhr.withCredentials = true

    const payload = { name: filename }

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          resolve()
        } else {
          reject()
        }
      }
    };

    xhr.send(JSON.stringify(payload));
  })
}

export const createDump = () => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Dumps.php`;

    xhr.open("POST", url, false);

    xhr.withCredentials = true

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          resolve()
        } else {
          reject()
        }
      }
    };

    xhr.send();
  })
}

export const downloadDump = (filename) => {
  const url = `${process.env.VUE_APP_API_HOST}/DumpsDownload.php?filename=${filename}`
  window.open(url, '_blank')
}