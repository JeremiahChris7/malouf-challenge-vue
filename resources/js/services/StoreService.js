import axios from 'axios'

const apiClient = axios.create({
    baseURL: "http://malouf-vue.test",
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export default {
    getCustomers() {
        return apiClient.get('/customers')
    }
}
