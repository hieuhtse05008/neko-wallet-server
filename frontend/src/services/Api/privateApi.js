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

// Blog Detail
export const getBlogDetail = (id) =>
  privateAxios({
    method: 'GET',
    url: `/auth/v1/blogs/${id}`,
  })

export const createBlogDetail = (data) =>
  privateAxios({
    method: 'POST',
    url: '/auth/v1/blogs',
    data: data,
  })

export const updateBlogDetail = (data) =>
  privateAxios({
    method: 'PUT',
    url: `/auth/v1/blogs/${data.id}`,
    data: data,
  })

// Blog group
export const getBlogGroups = () =>
  privateAxios({
    method: 'GET',
    url: '/auth/v1/blog-groups',
  })

export const createBlogGroup = (data) =>
  privateAxios({
    method: 'POST',
    url: '/auth/v1/blog-groups',
    data: data,
  })
