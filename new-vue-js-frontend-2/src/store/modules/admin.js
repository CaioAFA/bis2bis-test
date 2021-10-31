export default {
  namespaced: true,

  state: {
    session: {
      id: null,
      isLoggedIn: null,
      permissions: {
        canManagePosts: 0,
        canManageUsers: 0,
        canManageDumps: 0
      }
    },
  },
  mutations: {
    setAdminSessionData(state, newValue) {
      state.session = newValue;
    },
  },
}