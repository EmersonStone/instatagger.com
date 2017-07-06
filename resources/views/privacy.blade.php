<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16" /> --}}

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
  <body>
    <nav class="nav">
      <div class="-marketing">
        <div class="-content">
          <div class="logo">Tagnum PI</div>
          <div class="authenticate">Connect Your Account</div>
        </div>
      </div>
    </nav>
    <main>
      <div class="container">

      <h1>Privacy Policy</h1>

      <div class="-terms-title"><strong>Disclaimer</strong></div>
      <p>The privacy policy (the “Privacy Policy”) described below covers the entire Tagnum PI website (“the Site,” “we,” “us,” or “our”). Phrases such as “you,” “your” and other similar expressions refer to our customers, or the specific users of this Site. By visiting and using the Site, you accept the practices described in this Privacy Policy.</p>

      <div class="-terms-title"><strong>Collected Information</strong></div>
      <p>When you authenticate with Tagnum PI, our Site collects your Instragram information such as your username, user ID, Auth token, and Instagram image urls. Tagnum PI will use your information collected online to process your auto-tagging service. Additionally, your email address may be collected at various points within the Site so that we can send you any necessary email messages related to the Tagnum PI service, such as service confirmations. Analytics such as Site use and traffic patterns are also considered to help us improve the design of our website, the products we make and exclusive services we offer. At Tagnum PI, we understand and recognize that we must maintain and use customer information responsibly. Please note: You are not required to submit any information to our Site. However, without providing the requested information, you may be unable to access certain features of our Site, including viewing our services.</p>

      <div class="-terms-title"><strong>Additional Means of Obtaining Information</strong></div>
      <div class="-terms-title"><strong>Cookies</strong></div>
      <p>As you navigate our site, your preferences are remembered through the temporary use of “session” cookies. Cookies enable our systems to gather information about your browser as well as monitor the navigational patterns you take while browsing the site. Site users have the option to accept or disable cookies at any time through their browsers. If you choose to disable your cookies, your user experience may be limited.</p>

      <div class="-terms-title"><strong>Site Statistics</strong></div>
      <p>Web data is collected to monitor user trends on our Site. Analytical data such as hits to our server, traffic patterns and page views shows us where our audience is coming from and how they interact with us online. This type of collected information does not personally identify specific Site users. In addition, like most websites, our Site may utilize “web beacons,” “pixel tags” or other tracking technologies to help us study the actions of our users through non-personally identifiable information. This data may be aggregated with similar data collected from other users to help us improve Tagnum PI products, services and our overall Site experience.</p>

      <div class="-terms-title"><strong>Information Sharing with Outside Parties</strong></div>
      <p>Tagnum PI will never share, rent or sell your email address for any reason. We do not share your personal information with third-party companies, though we may provide aggregate Site statistics and related information to reputable third party vendors. This data will never include personal information. If for any reason you choose to access a third party website linked to our Site, you do so at your own risk. We are not held responsible for how these outside parties collect, use, protect or disclose the information you provide them.</p>

      <div class="-terms-title"><strong>Age Requirement</strong></div>
      <p>Tagnum PI is intended for users who are 18 years of age and older. If you are under the age of 18, you are not permitted to submit any personal information to us.</p>

      <div class="-terms-title"><strong>Security</strong></div>
      <p>We employ top physical, electronic, and administrative safety measures to assist us in protecting your personal information. These safeguards help us to prevent fraud and unauthorized access as well as maintain data accuracy. In addition, we use professionally reasonable efforts to block access to your personal information from Tagnum PI employees and corporate partners to ensure your personal information is always kept safe.</p>

      <div class="-terms-title"><strong>Modification of Policies</strong></div>
      <p>It is at our sole discretion that Tagnum PI may modify this Privacy Policy to better serve our customers. Please check back often to review any new modifications that have been made</p>

      <div class="-terms-title"><strong>Summary</strong></div>
      <p>Tagnum PI takes your privacy seriously. When connecting with us, we want our customers to feel confident that their personal information and credit card data is protected. Just as we are dedicated to bringing you the very best products, we are equally committed to providing our customers with a safe and secure shopping experience. The personal information we collect from our Site helps us better understand the interests of our audience in an ongoing effort to bring you improved service. If you have questions or suggestions regarding our privacy standards please email hello@emersonstone.com</p>
    </div>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="-content">
          <h2>Quick Facts</h2>
          <div class="-fact">We don’t store your photos and we don’t share your data ever</div>
          <div class="-fact">You can disconnect your account at any time</div>
          <div class="-fact">This app is from your friends at <a href="emersonstone.com" target="_blank">Emerson Stone</a></div>
          <div class="-fact">Read the <a href="/terms-and-conditions">terms and conditions</a> and <a href="/privacy-policy">privacy policy</a></div>
          <div class="-fact">The average human head weighs 8.4 lbs.</div>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
