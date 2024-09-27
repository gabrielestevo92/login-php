import React from "react";
import logo from "../../assets/Bootstrap_logo.svg.png"
import './login.css'
import Form from "../form/Form";

const Login = () => {
    return(
        <div className="container">
            <img src={logo} width={50}/>
            <Form/>
            <span>&copy; 2017-2024</span>
        </div>
        
    )
}

export default Login