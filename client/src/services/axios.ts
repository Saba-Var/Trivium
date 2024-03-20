import { axiosConfig } from '@/config/axiosConfig'
import Axios from 'axios'

const axios = Axios.create(axiosConfig)

export { axios }
