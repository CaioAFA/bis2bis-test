export const isAuthenticated = () => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Authorization.php`;

    xhr.open("GET", url, false);

    xhr.withCredentials = true

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          resolve()
        } else {
          document.cookie = ''
          reject()
        }
      }
    };

    xhr.send();
  })
}

export const authenticate = (email, password) => {
  return new Promise((resolve, reject) => {
    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Authorization.php`;

    xhr.open("POST", url, false);

    const payload = { email: email, password: password }

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          const sessionId = this.responseText.replaceAll('"', '')
          document.cookie = `PHPSESSID=${sessionId}; expires=Sun, 31-Oct-2021 05:20:31 GMT; Max-Age=3600; path=/; domain=.teste-bis2bis.com.br;`
          resolve()
        } else {
          reject()
        }
      }
    };

    xhr.send(JSON.stringify(payload));
  })
}

export const logout = () => {
  // Clean all cookies
  function cleanAllCookies(){
    var cookies = document.cookie.split("; ");
    for (var c = 0; c < cookies.length; c++) {
      var d = window.location.hostname.split(".");
      while (d.length > 0) {
        var cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
        var p = location.pathname.split('/');
        document.cookie = cookieBase + '/';
        while (p.length > 0) {
          document.cookie = cookieBase + p.join('/');
          p.pop();
        }
        d.shift();
      }
    }
  }
  cleanAllCookies();
}