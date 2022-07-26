import baseAxios from '../baseAxios'

export const login = (email, password) => {
  return baseAxios({
    method: 'POST',
    url: '/login',
    data: {
      email,
      password,
      device_name: 'login',
    },
  })
}
