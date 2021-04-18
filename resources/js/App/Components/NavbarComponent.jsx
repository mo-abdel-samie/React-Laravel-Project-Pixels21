import React from 'react';
import {NavLink} from "react-router-dom";


import Logo from './logoPixels.png';
// import { Link } from 'react-router-dom';


function NavBarLink(props){
    return (
        <li className="nav-item">
            <NavLink className="nav-link " to={props.path}> {props.title}</NavLink>
        </li>
    );
}


function NavbarComponent() {
    return (
        <>
            <nav  className="navbar navbar-expand-lg navbar-dark">

                <div className="container">
                    <NavLink className="navbar-brand" to="/home">
                        <img src={Logo} className="d-inline-block align-top mr-2" style={{width:"2em"}} alt="pixels Logo" loading="lazy" />
                    </NavLink>


                    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>

                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav ml-auto">
                            <NavBarLink title="Home"     path="/home" />
                            <NavBarLink title="About"     path="/about" />
                            <NavBarLink title="Projects" path="/project-contest" />
                            <NavBarLink title="Blogs"    path="/blogs" />
                            <NavBarLink title="Events"   path="/pixels-events" />
                            <NavBarLink title="Magazine" path="/magazine" />
                        </ul>
                    </div>
                </div>

            </nav>
        </>
        );
    }

export default NavbarComponent;
