export default function Footer() {
  return (
    <footer className="absolute bg-green-400 w-full pt-8 pb-6 bottom-0 left-0 h-[250] ">
      <div className="footer-container w-full">
        <div className="footer-logo">
          {/* <img src={logo} alt="logo" /> */}
        </div>
        <div className="footer-topics">
          <ul>
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#projects">Projects</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
        </div>
        <div className="footer-links">
        <ul>
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#projects">Projects</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  )
}