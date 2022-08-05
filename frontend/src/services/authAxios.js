import axios from 'axios'

const authAxios = axios.create({
  baseURL: 'http://localhost:4444/api/',
  headers: {
    Accept: 'application/json',
  },
})

authAxios.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token')
    if (token) {
      config.headers.Authorization = `Bearer ${token}`
    }
    return config
  },
  (error) => {
    return Promise.reject(error)
  }
)

authAxios.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response.status === 401) {
      localStorage.removeItem('token')
      window.location.href = '/login'
    }
  }
)

export default authAxios
