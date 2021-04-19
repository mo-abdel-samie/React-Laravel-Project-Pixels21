import React from 'react';
import Header from './Components/Header';
import F_Q from './Components/F_Q';
import Slogan from './Components/Slogan';
import './AboutStyles.css';
import Team from './Components/Team';

export default function AboutPage() {
  return (
    <>
      <Header/>
      <Slogan/>
      <Team />
      <F_Q/>
    </>
  )
}