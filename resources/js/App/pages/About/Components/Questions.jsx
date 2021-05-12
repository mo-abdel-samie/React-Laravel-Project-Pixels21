import React, {useState} from 'react';
import { FaArrowCircleRight } from "react-icons/fa";
import { Container, Row, Col } from 'react-bootstrap';



const Questions = () => {    
  const [questions, setQuestions] = useState([
    {
      id: 0,
      title: "Can I edit the websites myself?",
      answer: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.",
      answerState: false,
    },
    {
      id: 1,
      title: "Can I edit the websites myself?",
      answer: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.",
      answerState: false,
    },
    {
      id: 2,
      title: "Can I edit the websites myself?",
      answer: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.",
      answerState: false,
    },
  ]);

  const showAnswer = (id) => {
    let currentState = [...questions];
    currentState[id].answerState = !currentState[id].answerState; 
    setQuestions(currentState);
  };


  return (
    <Container className="F_Q my-5" id="F_Q">
      <Row className="justify-content-lg-between justify-content-center">
        <Col lg={3} md={4} className="F_Q-titles">
          <h3 className="F_Q-info-subtitle text-lg-left text-center">Recurring questions I get</h3>
          <p className="section-title1">F.A.Q</p>
        </Col>
        <Col lg={8} md={8} sm={12} className="F_Q-questions">
          <p className="F_Q-questions-desc text-lg-left text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
          <div className="F_Q-questions-container mt-5">
            {questions.map((question, index) => (
              <div key={index} className={question.answerState ? "question-container show mt-5" : "question-container hide mt-5"}>
                <h5 onClick={()=> showAnswer(question.id)} className="question">{question.title}<FaArrowCircleRight className="float-right question-icon"/></h5>
                <p className="answer">{question.answer}</p>
              </div>
            ))}
          </div>
        </Col>
      </Row>
    </Container>
  )
}
export default Questions;