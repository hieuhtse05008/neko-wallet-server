import axios from 'axios'

const authApi = axios.create({
  baseURL: 'http://localhost:4444/api/',
  headers: {
    Accept: 'application/json',
  },
})

export const login = (email, password) => {
  return authApi({
    method: 'POST',
    url: '/login',
    data: {
      email,
      password,
      device_name: 'login',
    },
  })
}
