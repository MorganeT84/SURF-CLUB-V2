import React, { Component } from 'react';
import { a } from 'react-router-dom';

import '../components/Header/header.scss';

class Header extends Component {

  render() {
    return (
      <header className='navbar-header'>
        <div className='div-img'>
          <a href='/'>
            <img src='/images/logo-absc.png' title='Logo du club ABSC 66' alt='Logo du club ABSC 66' />
          </a>
          <p>Association <br /> des bodyboardeurs,<br /> paddlers et surfeurs catalans</p>
        </div>

        <div className='connect'>
          <p>Salut Bro!</p>
          <button type="button" className="btn btn-danger">Se déconnecter</button>
        </div>

        <nav className="navbar navbar-expand-lg bg-body-tertiary">
          <div className="container-fluid">
            <button className="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNavDropdown">
              <ul className="navbar-nav">
                <li className="nav-item">
                  <a className={"navbar-brand"} href="/" >Accueil</a>
                </li>
                <li className="nav-item">
                  <a className={"nav-a"} href="/sessions">Sessions</a>
                </li>
                <li className="nav-item">
                  <a className={"nav-a"} href={"/Team"}>Team</a>
                </li>
                <li className="nav-item">
                  <a className={"nav-a"} href={"/spots"}>Spots</a>
                </li>
                <li className="nav-item">
                  <a className={"nav-a"} href={"/surf-camps"}>Surf-camps</a>
                </li>
                <li className="nav-item">
                  <a className={"nav-a"} href={"/contact"}>Contact</a>
                </li>

              </ul>
            </div>
          </div>
        </nav>



      </header>

    )
  }
};

export default Header;
