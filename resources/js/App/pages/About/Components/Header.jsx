import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Row } from 'react-bootstrap';


const Header = () => {
  return (
    <>
      <header style={{"backgroundImage": "url('/images/header/About.jpg')"}} className="position-relative page-header">
        <div className="about-header-container mx-3 d-flex justify-content-between align-items-center">
          <div className="about-header-info text-light ml-lg-2">
            <Row className="justify-content-center">
              <div className="header-info-titles mb-md-3 col-lg-3 col-12">
                <h1 className="about-header-info-subtitle">About Us</h1>
                <h2 className="about-header-info-title">Our Story!</h2>
              </div>
              <div className="about-header-info-desc col-lg-9 col-md-12">
                <p className="header-info-desc1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.</p>
                <Row className="header-info-desc2 justify-content-between">
                  <div className="header-info-desc2-left col-md-6 col-12">
                    <h4 className="header-info-desc2-left-title">Passion for Helping others</h4>
                    <p className="header-info-desc2-left-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                  </div>
                  <div className="header-info-desc2-right col-md-6 col-12">
                    <h4 className="header-info-desc2-right-title">Working in a Team Work</h4>
                    <p className="header-info-desc2-right-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                  </div>
                </Row>
              </div>
            </Row>
          </div>
          <div className="about-social-media text-center mr-2">
            <ul className="list">
              <li className="my-3">
                <a target="_blanck" className="my-4" href="https://www.facebook.com/PixelsEgyptOrg/">
                  <FaFacebookF size="1.5rem"/>
                </a>
              </li>
              <li className="my-3">
                <a target="_blanck" className="my-4" href="https://twitter.com/pixelsegypt?lang=en">
                  <FaTwitter size="1.5rem"/>
                </a>
              </li>
              <li className="my-3">
                <a target="_blanck" className="my-4" href="https://www.instagram.com/pixelsegypt/">
                  <AiFillInstagram size="1.5rem"/>
                </a>
              </li>
              <li className="my-3">
                <a target="_blanck" className="my-4" href="https://www.youtube.com/c/PixelsEgypt">
                  <FaYoutube size="1.5rem"/>
                </a>
              </li>
              <li className="my-3">
                <a target="_blanck" className="my-4" href="https://www.linkedin.com/company/pixels-hsb/">
                  <FaLinkedinIn size="1.5rem"/>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <img alt="wave" src={ waves } alt="Waves" className="wave position-absolute w-100"/>
      </header>
    </>
  )
}

export default Header;