import React, { useContext } from 'react';
import { Col, Container, Row } from 'react-bootstrap';
import { RiTimer2Line } from 'react-icons/ri';
import { AiOutlineUnlock } from 'react-icons/ai';
import { FaRegArrowAltCircleRight } from 'react-icons/fa';
import { Link } from 'react-router-dom';
import { FaFacebookF, FaLinkedinIn, FaTwitter, FaStar } from 'react-icons/fa';
import CoursesItem from '../../../Components/CoursesItem';

import { CoursesContext } from "../../../Contexts/CoursesContext";


function Course() {

  const {course} = useContext(CoursesContext);
  const {includes_titles, includes_icons, content, share_links, average_rate} = {...course}; 
  //  useEffect(() => {
  //   if (props.match.params.id && props.match.params.id === course.id) {
  //     setIsActive(true);
  //   } else {
  //     setIsActive(false);
  //   }
  // }, [activeCourse]);

  return (
    <>
    <section className="course">
      <Container>
        <Row className="justify-content-between w-100 align-items-start py-120">
          <Col lg={8} sm={12}>
            <div className="mb-5 desc">
              <h3 className="title desc-title"></h3>
              <p className="text1"></p>
              <p className="text1"></p>
            </div>

            <div className="mb-5 content">
              <h3 className="title content-title">Content</h3>
              {course.content.map((item, index)=> (
                <p key={index} className="text2"><FaRegArrowAltCircleRight className="text-color d-inline"/>{item}</p>                  
              ))}
            </div>

            <div className="mb-5 requirements">
              <h3 className="title requirements-title">Requirements</h3>
              <p className="text1">Entered have break himself cheek, and with activity that, for bit of text, never just as our have they of begin to cannot in of ran middle at behind seal that their accustomed never just as our have they of begin to cannot in of ran middle at behind seal that their accustomed. For devotion their to though one rationally small sight. In so her has I solider.</p>
            </div>

            <div className="mb-5 students-thoughts">
              <h3 className="title students-thoughts-title">What do <span className="text-color">students think</span> about the course?</h3>
              <div className="students-thoughts-rating p-4">
                <Row className="justify-content-between align-items-center w-100">
                  <Col md={4} sm={12}>
                    <h5 className="text1">Average rating: </h5>
                    <span className="text-color">4.75</span>
                    <h5 className="text1">Out of 1534 reviews </h5>
                    <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                  </Col>
                  <Col md={4} sm={12}>
                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </Col>

                  <Col md={4} sm={12}>
                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div className="rate">
                      <p className="my-auto">
                        <span className="text-color"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /></span>
                        <span className="float-right mt-1 text1">79%</span>
                      </p>
                      <div className="progress">
                        <div className="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </Col>
                </Row>
              </div>

              {/* <div className="student-reviews">
                <h3 className="title reviews-title"></h3>

              </div> */}
            </div>

          </Col>

          <Col lg={4} sm={12}>
            <div className="mb-5 inclides">
              <h3 className="title inclides-title">This course includes</h3>
              {course.includes_icons.map((icon, index)=> (
                <>
                  <p key={index} className="text1"><RiTimer2Line className="d-inline"/></p>                 
                  <p key={index} className="text1"><AiOutlineUnlock className="d-inline"/>{course.includes_titles[index]}</p>
                </>
              ))}
              
            </div>

            <div className="mb-5 tags">
              <h3 className="title tags-title">Tags</h3>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-5 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link><br />

              <Link to="/" className="tages-link d-inline-block m-1 px-5 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link><br />

              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link>
              <Link to="/" className="tages-link d-inline-block m-1 px-5 py-2 ">Ux</Link><br />
            </div>

            <div className="mb-5 share">
              <h3 className="title share-title">Share Course</h3>
              <a href="https://www.facebook.com/PixelsEgyptOrg/" className="text-light "><FaFacebookF className="share-link facebook rounded-circle d-inline-block p-3" size="3rem"/></a>
              <a href="https://www.linkedin.com/company/pixels-hsb/" className="text-light mx-3"><FaLinkedinIn className="share-link linkedin rounded-circle d-inline-block p-3" size="3rem"/></a>
              <a href="https://twitter.com/pixelsegypt?lang=en" className="text-light "><FaTwitter className="share-link twitter rounded-circle d-inline-block p-3" size="3rem"/></a>
            </div>
          </Col>
        </Row>
      </Container>

      <div className="other-courses py-120">
        <Container>
          <h2 className="mb-4 other-courses-title">Other Courses You May Like</h2>
          <CoursesItem allCourses={"all"}/>
        </Container>
      </div>
    </section>
    </>
  )
}

export default Course
