import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Link } from 'react-router-dom';


const Header = () => {
  return (
  <>
  <header style={{"backgroundImage": "url('/images/header/Courses.png')"}} className="page-header">
    <div className="overlayer">
      <div className="header-container d-flex mx-3 justify-content-between align-items-center">
        <div className="courses-header-info text-light w-auto">
          <h1 className="courses-header-title mb-4">Thousands of classes <br /> to <span className="text-color">explore</span> your <br /><span className="text-color">creativity</span> and <span className="text-color">grow</span><br /> your <span className="text-color">career</span></h1>
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

export default Header;