import Axios from 'axios';


export const Api = Axios.create({
    baseURL: "http://localhost:8000/api/v1/",     
    headers : {
        // Authorization:"JWT eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOjM4NSwiaXNfYnVzaW5lc3MiOnRydWUsImFjY2VzcyI6ImF1dGgiLCJpYXQiOjE2MDgyMjk2MTJ9.49q-PsQzS8TJUO44UY_hCHnQkVtPbq30M1jdOyY3Nxc"
    },
    data:{
        "api_password":"145",
    },
    timeout:3000
})