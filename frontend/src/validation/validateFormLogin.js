/* eslint-disable no-useless-escape */
export const emailValidation = [
  (value) => !!value || 'E-mail is required',
  (value) => /.+@.+\..+/.test(value) || 'E-mail must be valid',
]

export const passwordValidation = [
  (value) => !!value || 'Password is required',
  (value) => value.length >= 6 || 'Password must be at least 6 characters',
]
