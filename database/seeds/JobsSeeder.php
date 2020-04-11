<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_titles = [
            'Web developer' => 'app/images/jobs/web_development_icon.jpg',
            'Video Game developer' => 'app/images/jobs/video_game_development_icon.jpg',
            'Artificial Intelligence | Machine Learning Engineer' => 'app/images/jobs/web_development_icon.jpg',
            'Computer Research Scientist' => 'app/images/jobs/web_development_icon.jpg',
            'Data Analyst' => 'app/images/jobs/web_development_icon.jpg',
            'IT Manager' => 'app/images/jobs/web_development_icon.jpg',
            'Database Administrator' => 'app/images/jobs/web_development_icon.jpg',
            'Information Security Analyst' => 'app/images/jobs/web_development_icon.jpg',
            'Software Engineer' => 'app/images/jobs/web_development_icon.jpg',
            'Computer Hardware Engineer' => 'app/images/jobs/web_development_icon.jpg',
            'Computer Systems Analyst' => 'app/images/jobs/web_development_icon.jpg',
            'DevOps Engineer' => 'app/images/jobs/web_development_icon.jpg',
            'Computer Network Architect' => 'app/images/jobs/web_development_icon.jpg',
            'Mobile Application Developer' => 'app/images/jobs/web_development_icon.jpg',
        ];

        $job_descriptions = [
            'A web developer is a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications using a client–server model. The applications typically use HTML, CSS and JavaScript in the client, PHP, ASP.NET (C#) or Java in the server, and http for communications between client and server. A web content management system is often used to develop and maintain web applications.',
            'A video game developer is a software developer that specializes in video game development – the process and related disciplines of creating video games. A game developer can range from one person who undertakes all tasks to a large business with employee responsibilities split between individual disciplines, such as programming, design, art, testing, etc.',
            'Artificial intelligence is the goal of a machine learning engineer. They are computer programmers, but their focus goes beyond specifically programming machines to perform specific tasks. They create programs that will enable machines to take actions without being specifically directed to perform those tasks. An example of a system a machine learning engineer would work on is a self-driving car. There are a number of applications for the work that machine learning engineers do. They may program services so that they can try to identify a specific person\'s interests or needs. From customized news feeds to tailored web searches, machine learning engineers are contributing to the daily lives of many individuals and how they use technology.',
            'A computer scientist is a person who has acquired the knowledge of computer science, the study of the theoretical foundations of information and computation and their application. Computer scientists typically work on the theoretical side of computer systems, as opposed to the hardware side on which computer engineers mainly focus (although there is overlap). Although computer scientists can also focus their work and research on specific areas (such as algorithm and data structure development and design, software engineering, information theory, database theory, computational complexity theory, numerical analysis, programming language theory, computer graphics, and computer vision), their foundation is the theoretical study of computing from which these other fields derive. A primary goal of computer scientists is to develop or validate models, often mathematical, to describe the properties of computer-based systems (processors, programs, computers interacting with people, computers interacting with other computers, etc.) with an overall objective of discovering designs that yield useful benefits (faster, smaller, cheaper, more precise, etc.).',
            'Analytics is the discovery, interpretation, and communication of meaningful patterns in data. It also entails applying data patterns towards effective decision making. In other words, analytics can be understood as the connection between data and effective decision making within an organization. Especially valuable in areas rich with recorded information, analytics relies on the simultaneous application of statistics, computer programming and operations research to quantify performance. Organizations may apply analytics to business data to describe, predict, and improve business performance. Specifically, areas within analytics include predictive analytics, prescriptive analytics, enterprise decision management, descriptive analytics, cognitive analytics, Big Data Analytics, retail analytics, supply chain analytics, store assortment and stock-keeping unit optimization, marketing optimization and marketing mix modeling, web analytics, call analytics, speech analytics, sales force sizing and optimization, price and promotion modeling, predictive science, credit risk analysis, and fraud analytics. Since analytics can require extensive computation (see big data), the algorithms and software used for analytics harness the most current methods in computer science, statistics, and mathematics.',
            'The central aim of IT management is to generate value through the use of technology. To achieve this, business strategies and technology must be aligned. IT Management is different from management information systems. The latter refers to management methods tied to the automation or support of human decision making.[2] IT Management refers to IT related management activities in organizations. MIS is focused mainly on the business aspect, with a strong input into the technology phase of the business/organization. A primary focus of IT management is the value creation made possible by technology. This requires the alignment of technology and business strategies. While the value creation for an organization involves a network of relationships between internal and external environments, technology plays an important role in improving the overall value chain of an organization. However, this increase requires business and technology management to work as a creative, synergistic, and collaborative team instead of a purely mechanistic span of control. Historically, one set of resources was dedicated to one particular computing technology, business application or line of business, and managed in a silo-like fashion.[4] These resources supported a single set of requirements and processes, and couldn\'t easily be optimized or reconfigured to support actual demand. This led technology providers to build out and complement their product-centric infrastructure and management offerings with Converged Infrastructure environments that converge servers, storage, networking, security, management and facilities.[6][7] The efficiencies of having this type of integrated and automated management environment allows enterprises to get their applications up and running faster, with simpler manageability and maintenance, and enables IT to adjust IT resources (such as servers, storage and networking) quicker to meet unpredictable business demand.',
            'Database administrators (DBAs) use specialized software to store and organize data. The role may include capacity planning, installation, configuration, database design, migration, performance monitoring, security, troubleshooting, as well as backup and data recovery.',
            'At the core of information security is information assurance, the act of maintaining the confidentiality, integrity and availability (CIA) of information, ensuring that information is not compromised in any way when critical issues arise.[5] These issues include but are not limited to natural disasters, computer/server malfunction, and physical theft. While paper-based business operations are still prevalent, requiring their own set of information security practices, enterprise digital initiatives are increasingly being emphasized, with information assurance now typically being dealt with by information technology (IT) security specialists.',
            'A software engineer is a person who applies the principles of software engineering to the design, development, maintenance, testing, and evaluation of computer software. Prior to the mid-1970s, software practitioners generally called themselves computer scientists, computer programmers or software developers, regardless of their actual jobs. Many people prefer to call themselves software developer and programmer, because most widely agree what these terms mean, while the exact meaning of software engineer is still being debated.',
            'Computer engineering (CE) is a branch of engineering that integrates several fields of computer science and electronic engineering required to develop computer hardware and software.[1] Computer engineers usually have training in electronic engineering (or electrical engineering), software design, and hardware-software integration instead of only software engineering or electronic engineering. Computer engineers are involved in many hardware and software aspects of computing, from the design of individual microcontrollers, microprocessors, personal computers, and supercomputers, to circuit design. This field of engineering not only focuses on how computer systems themselves work but also how they integrate into the larger picture. Usual tasks involving computer engineers include writing software and firmware for embedded microcontrollers, designing VLSI chips, designing analog sensors, designing mixed signal circuit boards, and designing operating systems. Computer engineers are also suited for robotics research, which relies heavily on using digital systems to control and monitor electrical systems like motors, communications, and sensors.',
            'A systems analyst is an information technology (IT) professional who specializes in analyzing, designing and implementing information systems. Systems analysts assess the suitability of information systems in terms of their intended outcomes and liaise with end users, software vendors and programmers in order to achieve these outcomes.[1] A systems analyst is a person who uses analysis and design techniques to solve business problems using information technology. Systems analysts may serve as change agents who identify the organizational improvements needed, design systems to implement those changes, and train and motivate others to use the systems. Although they may be familiar with a variety of programming languages, operating systems, and computer hardware platforms, they do not normally involve themselves in the actual hardware or software development. They may be responsible for developing cost analysis, design considerations, staff impact amelioration, and implementation timelines.',
            'DevOps is a set of practices that combines software development (Dev) and information-technology operations (Ops) which aims to shorten the systems development life cycle and provide continuous delivery with high software quality.',
            'In computer engineering, computer architecture is a set of rules and methods that describe the functionality, organization, and implementation of computer systems. Some definitions of architecture define it as describing the capabilities and programming model of a computer but not a particular implementation.[1] In other definitions computer architecture involves instruction set architecture design, microarchitecture design, logic design, and implementation.',
            'Mobile app development is the act or process by which a mobile app is developed for mobile devices, such as personal digital assistants, enterprise digital assistants or mobile phones. These applications can be pre-installed on phones during manufacturing platforms, or delivered as web applications using server-side or client-side processing (e.g., JavaScript) to provide an "application-like" experience within a Web browser. ',
        ];

        $job_base_skills = file_get_contents(storage_path('app/images/skills/base_skills.json'));
        $json = json_decode($job_base_skills, true);
        $x = 0;

        foreach($job_titles as $key => $job_image)
        {
            DB::table('jobs')->insert([
                'job_name' => $key,
                'job_description' => $job_descriptions[$x],
                'base_skills' => json_encode($json[$key]),
                'job_image' => file_get_contents(storage_path($job_image)),
            ]);
            
            $x++;
        }  
    }
}
