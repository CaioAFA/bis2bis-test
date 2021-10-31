import store from '../store/store'

export const isAuthenticated = () => {
  return new Promise((resolve, reject) => {
    console.log(store.state.adminModule.session.isLoggedIn)
    if(store.state.adminModule.session.isLoggedIn)
      return resolve()

    var xhr = new XMLHttpRequest();

    var url = `${process.env.VUE_APP_API_HOST}/Authorization.php`;

    xhr.open("GET", url, false);

    xhr.withCredentials = true

    xhr.onreadystatechange = function () {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
          const sessionData = JSON.parse(this.responseText)

          if(!store.state.adminModule.session.isLoggedIn){
            store.commit('adminModule/setAdminSessionData', sessionData)
          }

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
          const response = JSON.parse(this.responseText)
          const sessionId = response['sessionId']
          document.cookie = `PHPSESSID=${sessionId}; expires=0; path=/; domain=.teste-bis2bis.com.br;`

          if(!store.state.adminModule.session.isLoggedIn){
            store.commit('adminModule/setAdminSessionData', response.sessionData)
          }

          resolve(response.sessionData)
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