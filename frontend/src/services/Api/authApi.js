import authAxios from '../authAxios'

export const logout = () => {
  authAxios({
    method: 'POST',
    url: '/logout',
  })
}

export const getBlogs = (params) =>
  authAxios({
    method: 'GET',
    url: '/auth/v1/blogs?orderBy=id',
    params: params,
  })

// Blog Detail
export const getBlogDetail = (id) =>
  authAxios({
    method: 'GET',
    url: `/auth/v1/blogs/${id}`,
  })

export const createBlogDetail = (data) =>
  authAxios({
    method: 'POST',
    url: '/auth/v1/blogs',
    data: data,
  })

export const updateBlogDetail = (data) =>
  authAxios({
    method: 'PUT',
    url: `/auth/v1/blogs/${data.id}`,
    data: data,
  })

// Blog group
export const getBlogGroups = () =>
  authAxios({
    method: 'GET',
    url: '/auth/v1/blog-groups',
  })

export const createBlogGroup = (data) =>
  authAxios({
    method: 'POST',
    url: '/auth/v1/blog-groups',
    data: data,
  })
