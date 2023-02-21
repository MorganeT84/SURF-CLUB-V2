import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import './header.scss';

class Header extends Component {

  render() {
    return (
      <header className='navbar-header'>
        <div className='div-img'>
          <Link to={"/"}>
            <img src='/images/logo-absc.png' title='Logo du club ABSC 66' alt='Logo du club ABSC 66' />
          </Link>
          <p>Association <br /> des bodyboardeurs,<br /> paddlers et surfeurs catalans</p>
        </div>

        <div className='connect'>
          <p>Salut Bro!</p>
          <button type="button" class="btn btn-danger">Se déconnecter</button>
        </div>

        <nav className="navbar navbar-expand-lg bg-body-tertiary">
          <div className="container-fluid">
            <button className="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNavDropdown">
              <ul className="navbar-nav">
                <li className="nav-item">
                  <Link className={"navbar-brand"} to={"/"}>Accueil</Link>
                </li>
                <li className="nav-item">
                  <Link className={"nav-link"} to={"/sessions"}>Sessions</Link>
                </li>
                <li className="nav-item">
                  <Link className={"nav-link"} to={"/Team"}>Team</Link>
                </li>
                <li className="nav-item">
                  <Link className={"nav-link"} to={"/spots"}>Spots</Link>
                </li>
                <li className="nav-item">
                  <Link className={"nav-link"} to={"/surf-camps"}>Surf-camps</Link>
                </li>
                <li className="nav-item">
                  <Link className={"nav-link"} to={"/contact"}>Contact</Link>
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
