import React from "react";
import './form.css'

const Form = () => {
    return(
        <form action="">
            <h1>Please sign in</h1>    
            <input id="email" type="text" placeholder="Email address" />
            <div className="remember-me">
                <input type="checkbox" id="remember"/>
                <label htmlFor="remember">Remember me</label>
            </div>
            <input id="next" type="submit" name="next"/>
            
        </form> 
    )
}

export default Form;