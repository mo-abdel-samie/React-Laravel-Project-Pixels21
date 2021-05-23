import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Link } from 'react-router-dom';
import { Col, Row } from 'react-bootstrap';


function Header({header_desc, header_image, name}) {

  return (
    <>
      <header style={{"backgroundImage": "url("+`/${header_image}`+")"}} className="page-header">
        <div className="overlayer">
          <Row className="header-container mx-5 justify-content-between align-items-center">
            <Col lg={11} className="courses-header-info text-light w-auto">
              <Row className="justify-content-lg-between w-100 align-items-start">
                <Col lg={3}>
                  <h1 className="courses-header-title mb-4">{name}</h1>
                </Col>
                <Col lg={8}>
                  <p className="text-color2 course-header-desc">{header_desc}</p>
                </Col>
              </Row>
              <Link to="/" className="courses-header-link p-2 text-light">get started for free</Link>
            </Col>

            <div  className="courses-social-media text-center mr-2">
              <ul className="list">
                <li className="my-4">
                <a target="_blanck" className="my-4" href="https://www.facebook.com/PixelsEgyptOrg/">
                <FaFacebookF size="1.5rem"/>
                </a>
                </li>
                <li className="my-4">
                <a target="_blanck" className="my-4" href="https://twitter.com/pixelsegypt?lang=en">
                <FaTwitter size="1.5rem"/>
                </a>
                </li>
                <li className="my-4">
                <a target="_blanck" className="my-4" href="https://www.instagram.com/pixelsegypt/">
                <AiFillInstagram size="1.5rem"/>
                </a>
                </li>
                <li className="my-4">
                <a target="_blanck" className="my-4" href="https://www.youtube.com/c/PixelsEgypt">
                <FaYoutube size="1.5rem"/>
                </a>
                </li>
                <li className="my-4">
                <a target="_blanck" className="my-4" href="https://www.linkedin.com/company/pixels-hsb/">
                <FaLinkedinIn size="1.5rem"/>
                </a>
                </li>
              </ul>
            </div>
          </Row>
          <img alt="wave" src={ waves } alt="Waves" className="wave position-absolute w-100"/>
        </div>
      </header>
    </>
  )
}

export default Header
