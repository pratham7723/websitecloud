
# Shopy Cloud - AI-Powered E-commerce Website

## Overview
Shopy Cloud is an AI-powered e-commerce platform deployed on an Azure Ubuntu Virtual Machine. It leverages Azure Cognitive Services for personalized recommendations, AI-driven fraud detection, and intelligent customer support.

## Features
- **AI Chatbot** for 24/7 customer support.
- **Automated Deployment** using GitHub Webhook.
- **Secure & Scalable Deployment** on Azure with Apache/Nginx.

## Technology Stack
| Component      | Technology Used                        |
|--------------|---------------------------------|
| Frontend      | HTML, CSS, JavaScript         |
| Backend       | PHP                            |
| Database      | MySQL                          |
| AI Models     | Azure Cognitive Services (Recommendations, Language Understanding, Anomaly Detector) |
| Deployment    | Azure Virtual Machine (Ubuntu) |
| Web Server    | Apache/Nginx                    |

## Installation & Setup
### Prerequisites
- An Azure account with access to Virtual Machines.
- Ubuntu 24.04 VM with necessary configurations.
- Apache/Nginx installed and configured.
- MySQL database setup.
- Git and GitHub repository for version control.

### Steps to Deploy
1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/shopycloud.git
   cd shopycloud
   ```
2. **Set Up MySQL Database**
   ```sql
   CREATE DATABASE shopycloud;
   CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';
   GRANT ALL PRIVILEGES ON shopycloud.* TO 'admin'@'localhost';
   FLUSH PRIVILEGES;
   ```
3. **Configure Web Server (Apache/Nginx)**
   - Ensure the web server is installed.
   - Set up the virtual host configuration to serve the website.
   - Enable SSL for secure transactions.

4. **Configure GitHub Webhook for Auto-Deployment**
   - In your GitHub repository, go to **Settings > Webhooks**.
   - Add a new webhook pointing to your VM’s listener script.
   - Ensure the listener script pulls the latest code upon updates.

5. **Start the Application**
   ```bash
   sudo systemctl restart apache2  # For Apache
   sudo systemctl restart nginx    # For Nginx
   ```

## Deployment Details
- The application is hosted on an **Azure Virtual Machine (Ubuntu 24.04)**.
- GitHub Webhook is used to automatically deploy the latest code.
- AI models are integrated through **Azure Cognitive Services**.
- The **MySQL database** stores product, customer, and transaction data.
- The **Apache/Nginx web server** is configured with SSL for security.

## Live Demo
For a live demo, check out: [Shopy Cloud](https://shopycloud.mooo.com)

## Future Enhancements
- **Voice-Based Shopping** integration.
- **Augmented Reality** for virtual try-ons.
- **Advanced AI-driven fraud prevention**.
- **Enhanced inventory prediction models**.
- **Personalized Product Recommendations** using AI.
- **Fraud Detection** via Anomaly Detection models.
- **Smart Inventory Management** to optimize stock levels.

## Contribution Guidelines
- Fork the repository.
- Create a new branch for your changes.
- Submit a pull request with a detailed explanation.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact
For any queries, reach out at [prathammehta773@gmail.com](mailto:prathammehta773@gmail.com).


