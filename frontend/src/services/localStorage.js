export default {
  get (key, defaultValue) {
      return window.localStorage.getItem(key) || defaultValue
  },
  getObject (key) {
      return JSON.parse(window.localStorage.getItem(key) || null)
  },
  remove (key) {
      return window.localStorage.removeItem(key)
  },
  set (key, value) {
      window.localStorage.setItem(key, value)

      return this.get(key)
  },
  setObject (key, object) {
      window.localStorage.setItem(key, JSON.stringify(object))

      return this.getObject(key)
  }
}
