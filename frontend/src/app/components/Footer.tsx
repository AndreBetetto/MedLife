import Image from 'next/image'

export default function Footer() {
  return (
    <footer className="absolute w-full pt-8 pb-6 h-[250] bg-slate-50 dark:bg-slate-800">
      <div className="footer-container w-full flex space-x-16">
        <div className="footer-logo">
          <Image
            src="/icone.png"
            width={150}
            height={150}
            alt="logo"
          />
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