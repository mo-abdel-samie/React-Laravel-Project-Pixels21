import React from 'react';
import { FaFacebookF, FaTwitter, FaYoutube, FaLinkedinIn } from "react-icons/fa";
import { AiFillInstagram } from 'react-icons/ai/';
import waves from '../../../../../../public/images/Waves-shape.png';
import { Link } from 'react-router-dom';


const Header = () => {
  return (
  <>
  <header style={{"backgroundImage": "url('/images/header/Courses.png')"}} className="page-header d-flex">
    <div className="container align-self-center ">

      <div className="text-light">
          <h1 className="courses-header-title mb-4">
            Tens of classes to explore your creativity and grow your career
          </h1>
          <Link to="/" className="courses-header-link p-2 text-light">get started for free</Link>
        </div>

        <div className="col-12 d-flex justify-content-start justify-content-lg-center mt-4">
                <span className="mx-3">
                  <a target="_blanck" className="text-white" href="https://www.facebook.com/PixelsEgyptOrg/">
                    <FaFacebookF size="1.5rem"/>
                  </a>
                </span>
                <span className="mx-3">
                  <a target="_blanck" className="text-white" href="https://twitter.com/pixelsegypt?lang=en">
                    <FaTwitter size="1.5rem"/>
                  </a>
                </span>
                <span className="mx-3">
                  <a target="_blanck" className="text-white" href="https://www.instagram.com/pixelsegypt/">
                    <AiFillInstagram size="1.5rem"/>
                  </a>
                </span>
                <span className="mx-3">
                  <a target="_blanck" className="text-white" href="https://www.youtube.com/c/PixelsEgypt">
                    <FaYoutube size="1.5rem"/>
                  </a>
                </span>
                <span className="mx-3">
                  <a target="_blanck" className="text-white" href="https://www.linkedin.com/company/pixels-hsb/">
                    <FaLinkedinIn size="1.5rem"/>
                  </a>
                </span>
              </div>

    </div>

  </header>
  </>
  )
}

export default Header;