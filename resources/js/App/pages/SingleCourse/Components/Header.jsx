import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Link } from 'react-router-dom';
import { Col, Row } from 'react-bootstrap';


function Header() {
  return (
    <>
      <header style={{"backgroundImage": "url('/images/header/Course.png')"}} className="page-header">
        <div className="overlayer">
          <div className="header-container d-flex mx-3 justify-content-between align-items-center">
            <div className="courses-header-info text-light w-auto">
              <Row className="justify-content-lg-between align-items-start">
                <Col lg={3}>
                  <h1 className="courses-header-title mb-4"><span className="text-color">Ux</span> Design Fundamentals</h1>
                </Col>
                <Col lg={8}>
                  <p className="text-color2 course-header-desc">Completely mesh interactive web-readiness via mission-critical growth strategies. Seamlessly maintain granular communities through cross-platform niches.</p>
                  <p className="text-color2 course-header-desc">Holisticly unleash end-to-end users after long-term high-impact channels. Globally synthesize proactive bandwidth with interactive content.</p>
                </Col>
              </Row>
              <Link to="/" className="courses-header-link p-2 text-light">get started for free</Link>
            </div>
            
            <div className="courses-social-media text-center mr-2">
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
          </div>
          <img alt="wave" src={ waves } alt="Waves" className="wave position-absolute w-100"/>
        </div>
      </header>
    </>
  )
}

export default Header
