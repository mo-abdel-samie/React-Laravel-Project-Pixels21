import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Row } from 'react-bootstrap';


const Header = () => {
  return (
    <>
      <header style={{"backgroundImage": "url('/images/header/About.jpg')"}} className="position-relative page-header d-flex">
        <div className="align-self-center ">
          <div className="about-header-info text-light container-fluid">
            <Row>
              <div className="col-lg-4 header-info-titles text-lg-right">
                <h1 className="font-weight-bold text-light">About Us</h1>
                <h2 className="about-header-info-title">Our Story!</h2> 
              </div>
              <div className="col-lg-8">
                <p className="header-info-desc1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.</p>
                
                <div className="my-3">
                  <h4 className="h3">Passion for Helping others</h4>
                  <p className="header-info-desc2-left-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                </div>

                <div className="header-info-desc2-right">
                  <h4 className="h3">Working in a Team Work</h4>
                  <p className="header-info-desc2-right-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                </div>
                
              </div>
            </Row>
          </div>
        </div>
        <img alt="wave" src={ waves } alt="Waves" className="wave position-absolute w-100"/>
      </header>
    </>
  )
}

export default Header;