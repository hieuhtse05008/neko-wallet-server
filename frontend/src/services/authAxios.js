import axios from 'axios'

const authAxios = axios.create({
  baseURL: 'http://localhost:4444/api/',
  withCredentials: true,
  headers: {
    Accept: 'application/json',
  },
})

export default authAxios
