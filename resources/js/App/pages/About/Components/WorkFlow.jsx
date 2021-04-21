import React, { useState } from 'react'
import { Container, Col, Row, Button } from 'react-bootstrap';



function WorkFlow() {
  const [workFlowTab, setWorkFlowTab] = useState('all');
  const workFlowTabs = ['all', 'CS', 'Power', 'Mechanics'];
  const data = [
    {
      id: 0,
      tab: "all",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
    {
      id: 1,
      tab: "CS",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
    {
      id: 2,
      tab: "Power",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
  ];

  var currentData = data;

  const tabHandler = (tab) => {
    setWorkFlowTab(tab);
    // console.log(currentData);
  }

  if(workFlowTab !== 'all') {currentData = data.filter(datum=> datum.tab === workFlowTab);}

  return (
    <Container className="work-flow py-120" id="work-flow">
      <Row className="justify-content-lg-between justify-content-center">
        <Col lg={3} md={4} className="work-flow-titles">
          <h3 className="work-flow-info-subtitle text-lg-left text-center">How does PIXELS work?</h3>
          <p className="section-title1">Work flow</p>
        </Col>

        <Col lg={8} md={8} sm={12} className="work-flow-tabs">
          <p className="work-flow-desc text-lg-left text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
          <ul className="nav mt-5 work-flow-tabs">
            {workFlowTabs.map((tab, index) => (
              <li key={index} className="nav-item">
                <Button size="lg" variant="outline-secondary" onClick={()=>tabHandler(tab)} className="work-flow-tab text-center">{++index+'.'+tab}</Button>
              </li>
            ))}
          </ul>

          <div className="work-flow-items">
            <div className="work-flow-item-container">
              <p className="work-flow-item-text p-4 ">{currentData[0] ? currentData[0].text : ''}</p>
            </div>
          </div>

        </Col>
      </Row>
    </Container>
  )
}

export default WorkFlow
