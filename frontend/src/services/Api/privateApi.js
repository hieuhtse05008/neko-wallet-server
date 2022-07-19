import privateAxios from '../privateAxios'

export const logout = () => {
  privateAxios({
    method: 'POST',
    url: '/logout',
  })
}

export const getBlogs = (data) =>
  privateAxios({
    method: 'GET',
    url: '/auth/v1/blogs',
    data: data,
  })
