export const generateStorageUrl = (path: string) => {
  return `${import.meta.env.VITE_BACKEND_BASE_URI}/storage/${path}`
}
