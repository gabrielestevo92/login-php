import React from "react";
import logo from "../../assets/Bootstrap_logo.svg.png"
import './login.css'

const Login = () => {
    return(
        <div className="container">
            <img src={logo} width={50}/>
            <form action="">
                <h1>Please sign in</h1>    
                <input type="text" placeholder="Email address" />
                <div className="remember-me">
                    <input type="checkbox" id="remember"/>
                    <label htmlFor="remember">Remember me</label>
                </div>
                <input type="submit" name="next"/>
                
            </form>    
        </div>
    )
}

export default Login