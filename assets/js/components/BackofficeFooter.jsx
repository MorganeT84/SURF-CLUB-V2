import React from 'react';
import '../components/Footer/footer.scss';

function Footer() {
  return (
    <div className='footer'>
    <ul className='logo-collab'>
      <li><img src='/images/logo-collab/logo-ligue-lr.jpeg' alt='' title='' /></li>
      <li><img src='/images/logo-collab/logo-federation-francaise-surf.png' alt='' title='' /></li>
      <li><img src='/images/logo-collab/logo-canet.png' alt='' title='' /></li>
    </ul>
      <p>Copyright 2023 MomoDev</p>
    </div>
  )
};

export default Footer;