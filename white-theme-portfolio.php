<?php
// Advanced Interactive Portfolio - White, Yellow & Pale Green Theme - index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#dbe1d5ff">
    <meta name="description" content="Uddissh Verma - Electronics Engineer, Robotics & IoT Specialist, Embedded Systems Developer">
    <title>Uddissh Verma - Electronics & Robotics Engineer</title>
    
    <!-- PWA Manifest -->
    <link rel="manifest" id="manifest-link">
    <script>
        const manifest = {
            "name": "Uddissh Verma Portfolio",
            "short_name": "Uddissh Portfolio",
            "description": "Electronics Engineer & Robotics Specialist Portfolio",
            "start_url": "./",
            "display": "standalone",
            "background_color": "#ffffff",
            "theme_color": "#caeaa6ff",
            "icons": [
                {
                    "src": "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkyIiBoZWlnaHQ9IjE5MiIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3QgeD0iMTAiIHk9IjIwIiB3aWR0aD0iODAiIGhlaWdodD0iNjAiIHJ4PSI1IiBmaWxsPSIjOGJjMzRhIiBzdHJva2U9IiM0Y2FmNTAiIHN0cm9rZS13aWR0aD0iMiIvPjxyZWN0IHg9IjIwIiB5PSIzMCIgd2lkdGg9IjYwIiBoZWlnaHQ9IjQwIiByeD0iMyIgZmlsbD0iI2M4ZTZjOSIvPjxjaXJjbGUgY3g9IjMwIiBjeT0iNDAiIHI9IjMiIGZpbGw9IiNmZmY5YzQiLz48Y2lyY2xlIGN4PSI1MCIgY3k9IjQwIiByPSIzIiBmaWxsPSIjZmZmOWM0Ii8+PGNpcmNsZSBjeD0iNzAiIGN5PSI0MCIgcj0iMyIgZmlsbD0iI2ZmZjljNCIvPjxjaXJjbGUgY3g9IjMwIiBjeT0iNjAiIHI9IjMiIGZpbGw9IiNmZmY5YzQiLz48Y2lyY2xlIGN4PSI1MCIgY3k9IjYwIiByPSIzIiBmaWxsPSIjZmZmOWM0Ii8+PGNpcmNsZSBjeD0iNzAiIGN5PSI2MCIgcj0iMyIgZmlsbD0iI2ZmZjljNCIvPjwvc3ZnPg==",
                    "sizes": "192x192",
                    "type": "image/svg+xml"
                }
            ]
        };
        
        const manifestBlob = new Blob([JSON.stringify(manifest)], {type: 'application/json'});
        const manifestURL = URL.createObjectURL(manifestBlob);
        document.getElementById('manifest-link').href = manifestURL;
    </script>
    
    <style>
        /* Reset and base - WHITE THEME */
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff; /* Pure white background */
            color: #2e7d32; /* Green text */
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
            transition: all 0.3s ease;
            min-height: 100vh;
        }
        a {
            color: #388e3c;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover, a:focus {
            color: #ffc107; /* Yellow on hover */
            outline: none;
            text-decoration: underline;
        }

        /* Light matrix rain background - Very subtle on white */
        .matrix-rain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -2;
            opacity: 0.03; /* Very light */
        }
        .matrix-column {
            position: absolute;
            top: -100px;
            font-family: monospace;
            font-size: 18px;
            color: #8bc34a; /* Pale green */
            animation: matrix-fall linear infinite;
            white-space: pre;
        }
        @keyframes matrix-fall {
            to { transform: translateY(calc(100vh + 100px)); }
        }

        /* Animated particles background - Subtle on white */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #fff59d; /* Light yellow particles */
            border-radius: 50%;
            animation: float 20s infinite linear;
            opacity: 0.4;
        }
        @keyframes float {
            0% { transform: translateY(100vh) translateX(0px); opacity: 0; }
            10% { opacity: 0.4; }
            90% { opacity: 0.4; }
            100% { transform: translateY(-100px) translateX(100px); opacity: 0; }
        }

        /* Gamification UI - White theme */
        .achievement-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(45deg, #fff9c4, #ffeb3b); /* Yellow gradient */
            color: #2e7d32;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.3);
            z-index: 3000;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s ease;
            border: 2px solid #8bc34a;
        }
        .achievement-popup.show {
            opacity: 1;
            transform: translateX(0);
        }
        .achievement-popup .icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .progress-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #f0f0f0; /* Light gray background */
            z-index: 2000;
        }
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #8bc34a, #ffeb3b, #4caf50); /* Green to yellow gradient */
            width: 0%;
            transition: width 0.3s ease;
            position: relative;
        }
        .progress-bar-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            animation: progress-shine 2s infinite;
        }

        .score-display {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.95);
            padding: 10px 15px;
            border-radius: 10px;
            border: 2px solid #ffeb3b; /* Yellow border */
            z-index: 2000;
            font-weight: 600;
            color: #2e7d32;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2);
        }
        .score-display .label {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        .score-display .value {
            font-size: 1.2rem;
            color: #ffc107; /* Yellow value */
        }

        /* AI Chatbot Styles - White theme */
        .chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 2000;
        }
        .chatbot-toggle {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #8bc34a, #ffeb3b); /* Green to yellow */
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(139, 195, 74, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            position: relative;
        }
        .chatbot-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(139, 195, 74, 0.4);
        }
        .chatbot-toggle::before {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 12px;
            height: 12px;
            background: #ffc107; /* Yellow notification */
            border-radius: 50%;
            animation: pulse-notification 2s infinite;
        }
        @keyframes pulse-notification {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.7; }
        }

        .chatbot-window {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 350px;
            height: 500px;
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            border-radius: 20px;
            border: 2px solid #8bc34a; /* Green border */
            box-shadow: 0 20px 40px rgba(139, 195, 74, 0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }
        .chatbot-window.show {
            display: flex;
            animation: chatSlideIn 0.3s ease;
        }
        @keyframes chatSlideIn {
            from { transform: translateY(20px) scale(0.9); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }

        .chatbot-header {
            background: linear-gradient(45deg, #8bc34a, #ffeb3b); /* Green to yellow */
            color: #2e7d32;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chatbot-header .title {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .chatbot-close {
            background: none;
            border: none;
            color: #2e7d32;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chatbot-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #ffffff; /* Pure white background */
        }
        .message {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .message.user {
            flex-direction: row-reverse;
        }
        .message .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }
        .message.bot .avatar {
            background: #8bc34a; /* Green avatar */
            color: white;
        }
        .message.user .avatar {
            background: #ffc107; /* Yellow avatar */
            color: white;
        }
        .message .content {
            background: #f8f9fa; /* Light gray background */
            padding: 10px 15px;
            border-radius: 15px;
            border: 1px solid #e9ecef;
            max-width: 80%;
            word-wrap: break-word;
        }
        .message.user .content {
            background: #fff9c4; /* Light yellow for user */
            border-color: #ffeb3b;
        }
        .typing-indicator {
            display: none;
            padding: 10px 15px;
            background: #f8f9fa;
            border-radius: 15px;
            border: 1px solid #e9ecef;
        }
        .typing-indicator.show {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .typing-dot {
            width: 6px;
            height: 6px;
            background: #8bc34a; /* Green dots */
            border-radius: 50%;
            animation: typing-bounce 1.4s infinite ease-in-out;
        }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }
        @keyframes typing-bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        .chatbot-input {
            padding: 15px 20px;
            border-top: 1px solid #e9ecef;
            display: flex;
            gap: 10px;
            background: white;
        }
        .chatbot-input input {
            flex: 1;
            border: 1px solid #8bc34a; /* Green border */
            border-radius: 20px;
            padding: 10px 15px;
            font-size: 14px;
            background: #ffffff;
            color: #2e7d32;
        }
        .chatbot-input input:focus {
            outline: none;
            border-color: #ffc107; /* Yellow focus */
            background: white;
        }
        .chatbot-send {
            background: #8bc34a; /* Green send button */
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .chatbot-send:hover {
            background: #ffc107; /* Yellow on hover */
            transform: scale(1.1);
        }

        /* Performance Dashboard - White theme */
        .performance-dashboard {
            position: fixed;
            top: 60px;
            left: 20px;
            background: rgba(255, 255, 255, 0.98);
            border: 2px solid #8bc34a; /* Green border */
            border-radius: 15px;
            padding: 15px;
            z-index: 1900;
            min-width: 250px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(139, 195, 74, 0.15);
            opacity: 0;
            transform: translateX(-100%);
            transition: all 0.5s ease;
        }
        .performance-dashboard.show {
            opacity: 1;
            transform: translateX(0);
        }
        .performance-dashboard h4 {
            margin: 0 0 15px 0;
            color: #2e7d32;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .metric {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0; /* Light gray separator */
        }
        .metric:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .metric .label {
            font-size: 0.9rem;
            color: #666;
        }
        .metric .value {
            font-weight: 600;
            color: #ffc107; /* Yellow values */
        }
        .metric .status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-left: 8px;
        }
        .metric .status.good { background: #8bc34a; } /* Green status */
        .metric .status.warning { background: #ffc107; } /* Yellow warning */
        .metric .status.error { background: #f44336; } /* Red error */

        .dashboard-toggle {
            position: fixed;
            top: 20px;
            left: 280px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #ffeb3b; /* Yellow border */
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 12px;
            color: #2e7d32;
            transition: all 0.3s ease;
            z-index: 2000;
        }
        .dashboard-toggle:hover {
            background: #fff9c4; /* Light yellow background */
            transform: scale(1.05);
        }

        /* 3D Project Visualizations - White theme */
        .pcb-3d-container {
            perspective: 1000px;
            margin: 20px 0;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(248, 249, 250, 0.5); /* Very light background */
            border-radius: 15px;
            border: 1px solid #e9ecef;
        }
        .pcb-3d {
            width: 150px;
            height: 100px;
            transform-style: preserve-3d;
            animation: pcb-rotate 10s infinite linear;
            cursor: pointer;
            transition: animation-play-state 0.3s ease;
        }
        .pcb-3d:hover {
            animation-play-state: paused;
        }
        @keyframes pcb-rotate {
            0% { transform: rotateX(20deg) rotateY(0deg); }
            25% { transform: rotateX(20deg) rotateY(90deg); }
            50% { transform: rotateX(20deg) rotateY(180deg); }
            75% { transform: rotateX(20deg) rotateY(270deg); }
            100% { transform: rotateX(20deg) rotateY(360deg); }
        }

        .pcb-face {
            position: absolute;
            width: 150px;
            height: 100px;
            background: #8bc34a; /* Green PCB */
            border: 2px solid #4caf50;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: white;
            font-weight: 600;
        }
        .pcb-front { transform: translateZ(5px); }
        .pcb-back { transform: rotateY(180deg) translateZ(5px); background: #689f38; } /* Darker green back */
        .pcb-right { transform: rotateY(90deg) translateZ(75px); width: 10px; background: #7cb342; }
        .pcb-left { transform: rotateY(-90deg) translateZ(75px); width: 10px; background: #7cb342; }
        .pcb-top { transform: rotateX(90deg) translateZ(50px); height: 10px; background: #7cb342; }
        .pcb-bottom { transform: rotateX(-90deg) translateZ(50px); height: 10px; background: #7cb342; }

        .circuit-animation {
            position: relative;
            width: 200px;
            height: 150px;
            margin: 20px auto;
            background: #8bc34a; /* Green PCB background */
            border-radius: 10px;
            border: 2px solid #4caf50;
            overflow: hidden;
        }
        .trace {
            position: absolute;
            background: #ffeb3b; /* Yellow traces */
            height: 3px;
        }
        .trace-h { width: 60px; }
        .trace-v { width: 3px; height: 60px; }
        .trace-1 { top: 30px; left: 20px; }
        .trace-2 { top: 30px; left: 120px; }
        .trace-3 { top: 90px; left: 20px; }
        .trace-4 { top: 90px; left: 120px; }
        .trace-5 { top: 30px; left: 78px; height: 3px; width: 44px; }
        .trace-6 { top: 90px; left: 78px; height: 3px; width: 44px; }

        .component {
            position: absolute;
            background: #ffc107; /* Yellow components */
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            color: #2e7d32;
            font-weight: 600;
        }
        .resistor { width: 20px; height: 8px; }
        .capacitor { width: 12px; height: 15px; border-radius: 50%; }
        .ic { width: 25px; height: 15px; background: #2e7d32; border-radius: 2px; color: white; }

        .comp-1 { top: 26px; left: 40px; }
        .comp-2 { top: 26px; left: 140px; }
        .comp-3 { top: 86px; left: 40px; }
        .comp-4 { top: 86px; left: 140px; }
        .comp-5 { top: 55px; left: 85px; }

        .current-flow {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #ffffff; /* White current flow */
            border-radius: 50%;
            animation: current-flow 3s infinite linear;
            opacity: 0.9;
            box-shadow: 0 0 8px #ffffff;
        }
        @keyframes current-flow {
            0% { transform: translate(0, 0); }
            25% { transform: translate(100px, 0); }
            50% { transform: translate(100px, 60px); }
            75% { transform: translate(0, 60px); }
            100% { transform: translate(0, 0); }
        }

        /* Container with parallax support */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 60px;
            position: relative;
            background-color: transparent;
        }

        /* Enhanced header with WHITE theme */
        header {
            background: linear-gradient(135deg, #ffffff, #fff9c4, #f0f4c3); /* White to light yellow */
            padding: 80px 20px 60px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.1); /* Yellow shadow */
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
        }
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="circuit" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23ffeb3b" opacity="0.2"/><line x1="0" y1="10" x2="20" y2="10" stroke="%238bc34a" stroke-width="0.5" opacity="0.15"/><line x1="10" y1="0" x2="10" y2="20" stroke="%238bc34a" stroke-width="0.5" opacity="0.15"/></pattern></defs><rect width="100" height="100" fill="url(%23circuit)"/></svg>') repeat;
            opacity: 0.4;
            animation: circuit-flow 30s infinite linear;
        }
        @keyframes circuit-flow {
            0% { transform: translateX(0) translateY(0); }
            100% { transform: translateX(-20px) translateY(-20px); }
        }
        header .content {
            position: relative;
            z-index: 1;
            transform: translateZ(20px);
        }
        header h1 {
            font-size: 3.5rem;
            margin: 0 0 15px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #2e7d32; /* Green title */
            text-shadow: 0 3px 8px rgba(255, 193, 7, 0.2); /* Yellow shadow */
            animation: glow 3s ease-in-out infinite alternate;
        }
        @keyframes glow {
            from { text-shadow: 0 3px 8px rgba(255, 193, 7, 0.2), 0 0 20px rgba(255, 235, 59, 0.3); }
            to { text-shadow: 0 3px 8px rgba(255, 193, 7, 0.2), 0 0 30px rgba(255, 235, 59, 0.5); }
        }
        .tagline {
            font-size: 1.4rem;
            color: #2e7d32;
            font-weight: 600;
            max-width: 700px;
            margin: 0 auto 20px;
            line-height: 1.4;
            min-height: 2em;
        }
        .subtitle {
            font-size: 1.1rem;
            color: #388e3c;
            font-weight: 400;
            opacity: 0;
            animation: slideUp 1s ease-out 1s forwards;
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Typing effect */
        .typing-text {
            border-right: 2px solid #ffc107; /* Yellow cursor */
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 50% { border-color: transparent; }
            51%, 100% { border-color: #ffc107; }
        }

        /* Enhanced Navigation with WHITE theme */
        nav {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px) saturate(180%);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 12px rgba(139, 195, 74, 0.1);
            border-radius: 0 0 15px 15px;
            transition: all 0.3s ease;
            border-bottom: 2px solid #8bc34a; /* Green border */
        }
        nav.scrolled {
            background-color: rgba(255, 255, 255, 0.99);
            backdrop-filter: blur(20px) saturate(200%);
            box-shadow: 0 5px 20px rgba(139, 195, 74, 0.15);
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            flex-wrap: wrap;
        }
        nav a {
            display: inline-block;
            padding: 1.2rem 1rem;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #2e7d32; /* Green text */
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 193, 7, 0.1), transparent); /* Yellow effect */
            transition: left 0.5s ease;
        }
        nav a:hover::before {
            left: 100%;
        }
        nav a:hover,
        nav a:focus {
            color: #ffc107; /* Yellow on hover */
            border-bottom-color: #ffc107;
            outline: none;
            background-color: rgba(255, 193, 7, 0.05);
            transform: translateY(-2px);
        }
        nav a.active {
            color: #ffc107;
            border-bottom-color: #ffc107;
        }

        /* Sections with WHITE theme - FIXED VISIBILITY */
        section {
            padding: 70px 0;
            opacity: 1;
            transform: translateY(0);
            transition: all 0.8s ease;
            position: relative;
            background-color: transparent;
            display: block;
        }
        section.visible {
            opacity: 1;
            transform: translateY(0);
        }
        section h2 {
            font-size: 2.5rem;
            color: #2e7d32; /* Green heading */
            border-bottom: 4px solid #ffeb3b; /* Yellow underline */
            padding-bottom: 15px;
            margin-bottom: 40px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #8bc34a, #ffeb3b); /* Green to yellow gradient */
        }

        /* Enhanced Cards with WHITE theme - FIXED VISIBILITY */
        .card {
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            border-radius: 20px;
            padding: 35px 35px 45px;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.1); /* Yellow shadow */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid #f0f4c3; /* Light yellow-green border */
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            opacity: 1;
            transform: translateY(0);
        }
        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 235, 59, 0.1), transparent); /* Yellow shimmer */
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }
        .card:hover::before {
            animation: shimmer 1.5s ease-in-out;
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
        }
        .card:hover,
        .card:focus-within {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(255, 193, 7, 0.2);
            border-color: #8bc34a; /* Green border on hover */
        }
        .card p {
            color: #424242; /* Dark gray text */
            font-size: 1.125rem;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        /* Enhanced SVG Icons with WHITE theme colors */
        .tech-icon {
            width: 50px;
            height: 50px;
            margin: 0 15px 15px 0;
            transition: all 0.4s ease;
            cursor: pointer;
            filter: drop-shadow(0 2px 4px rgba(255, 193, 7, 0.2)); /* Yellow shadow */
        }
        .tech-icon:hover {
            transform: scale(1.3) rotate(10deg);
            filter: drop-shadow(0 8px 16px rgba(255, 193, 7, 0.4));
        }

        /* Arduino Icon */
        .arduino-icon {
            animation: pulse 3s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Oscilloscope Icon */
        .scope-icon {
            animation: wave 2s infinite;
        }
        @keyframes wave {
            0%, 100% { transform: scaleY(1); }
            50% { transform: scaleY(1.05); }
        }

        /* Robot Icon */
        .robot-icon {
            animation: robot-move 4s infinite;
        }
        @keyframes robot-move {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-2deg); }
            75% { transform: rotate(2deg); }
        }

        /* Skills with WHITE theme - FIXED VISIBILITY */
        .skill-category {
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            border-radius: 15px;
            padding: 25px;
            border: 2px solid #f0f4c3; /* Light yellow-green border */
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            opacity: 1;
            transform: translateY(0);
        }
        .skill-category::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #8bc34a, #ffeb3b); /* Green to yellow */
            transition: left 0.8s ease;
        }
        .skill-category:hover::before {
            left: 0;
        }
        .skill-category:hover {
            border-color: #8bc34a; /* Green border on hover */
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(255, 193, 7, 0.15);
        }
        .skill-category h4 {
            color: #2e7d32; /* Green heading */
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .skill-progress {
            margin: 10px 0;
        }
        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-weight: 500;
            color: #2e7d32; /* Green text */
        }
        .progress-bar {
            height: 8px;
            background-color: #f5f5f5; /* Light gray background */
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #8bc34a, #ffeb3b, #4caf50); /* Green to yellow gradient */
            border-radius: 4px;
            width: 0%;
            transition: width 2s ease-out;
            position: relative;
        }
        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
            animation: progress-shine 2s infinite;
        }
        @keyframes progress-shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Project cards with WHITE theme - FIXED VISIBILITY */
        .project-card {
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            border-radius: 20px;
            padding: 30px;
            border: 2px solid #f0f4c3; /* Light yellow-green border */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: fit-content;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            opacity: 1;
            transform: translateY(0);
        }
        .project-card::after {
            content: '🔍';
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 18px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .project-card:hover::after {
            opacity: 1;
        }
        .project-card:hover {
            transform: translateY(-12px) rotateX(5deg);
            box-shadow: 0 20px 40px rgba(255, 193, 7, 0.2);
            border-color: #8bc34a; /* Green border on hover */
        }
        .project-card h4 {
            color: #ffc107; /* Yellow title */
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 600;
            position: relative;
        }
        .project-card h4::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ffc107, #8bc34a); /* Yellow to green */
            transition: width 0.5s ease;
        }
        .project-card:hover h4::after {
            width: 100%;
        }
        .project-card p {
            color: #424242; /* Dark gray text */
            font-size: 1rem;
            line-height: 1.6;
        }
        .project-card .tech-stack {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }
        .project-card .tech-stack span {
            display: inline-block;
            background-color: #f0f4c3; /* Light yellow-green background */
            color: #2e7d32; /* Green text */
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin: 2px 4px 2px 0;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #8bc34a;
        }
        .project-card .tech-stack span:hover {
            background-color: #ffeb3b; /* Yellow on hover */
            transform: scale(1.1);
            color: #2e7d32;
        }

        /* Modal styles with WHITE theme */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.98); /* White overlay */
            backdrop-filter: blur(10px);
            animation: modalFadeIn 0.3s ease;
        }
        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-content {
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            margin: 20px;
            padding: 40px;
            border-radius: 20px;
            border: 2px solid #8bc34a; /* Green border */
            max-width: 800px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.3s ease;
            color: #2e7d32; /* Green text */
            box-shadow: 0 20px 40px rgba(255, 193, 7, 0.15);
        }
        @keyframes modalSlideIn {
            from { transform: translateY(-50px) scale(0.9); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            color: #757575;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .modal-close:hover {
            color: #ffc107; /* Yellow on hover */
        }

        /* Contact form with WHITE theme */
        .contact-form {
            display: grid;
            gap: 20px;
            margin-top: 30px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            color: #2e7d32; /* Green labels */
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1rem;
        }
        .form-group input,
        .form-group textarea {
            padding: 15px;
            border: 2px solid #8bc34a; /* Green border */
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #2e7d32;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ffc107; /* Yellow focus */
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.2);
            background-color: #ffffff;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        .form-submit {
            padding: 15px 30px;
            background: linear-gradient(45deg, #8bc34a, #ffeb3b); /* Green to yellow */
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .form-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        .form-submit:hover::before {
            left: 100%;
        }
        .form-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
        }
        .form-submit.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .form-message {
            margin-top: 15px;
            padding: 15px;
            border-radius: 10px;
            font-weight: 500;
            display: none;
        }
        .form-message.success {
            background-color: #e8f5e9; /* Light green background */
            border: 1px solid #8bc34a;
            color: #2e7d32;
        }
        .form-message.error {
            background-color: #ffebee;
            border: 1px solid #f44336;
            color: #c62828;
        }

        /* Statistics with WHITE theme */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .stat-card {
            background: linear-gradient(145deg, #ffffff, #fffde7); /* White to light yellow */
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #f0f4c3; /* Light yellow-green border */
            transition: all 0.3s ease;
            opacity: 1;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #8bc34a; /* Green border on hover */
            box-shadow: 0 10px 20px rgba(255, 193, 7, 0.1);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffc107; /* Yellow numbers */
            margin-bottom: 10px;
            counter-reset: number var(--number);
        }
        .stat-number::before {
            content: counter(number);
            animation: countUp 2s ease-out forwards;
        }
        @keyframes countUp {
            from { --number: 0; }
            to { --number: var(--target); }
        }
        .stat-label {
            color: #2e7d32; /* Green labels */
            font-size: 1rem;
            font-weight: 500;
        }

        /* Grid layouts - FIXED VISIBILITY */
        .grid {
            display: grid;
            gap: 30px;
            margin-top: 30px;
        }
        .grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        }
        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        .grid > * {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.6s ease;
        }
        .grid.visible > * {
            opacity: 1;
            transform: translateY(0);
        }

        /* Timeline with WHITE theme */
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #8bc34a, #ffeb3b); /* Green to yellow */
            animation: timelineGlow 3s ease-in-out infinite alternate;
        }
        @keyframes timelineGlow {
            from { box-shadow: 0 0 5px rgba(139, 195, 74, 0.3); }
            to { box-shadow: 0 0 15px rgba(255, 235, 59, 0.5); }
        }
        .timeline-item {
            position: relative;
            margin-bottom: 30px;
            padding-left: 40px;
            opacity: 1;
            transform: translateX(0);
            transition: all 0.6s ease;
        }
        .timeline-item.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 8px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #8bc34a; /* Green dots */
            border: 3px solid #ffffff; /* White border */
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(139, 195, 74, 0.4);
        }
        .timeline-item:hover::before {
            transform: scale(1.3);
            background-color: #ffc107; /* Yellow on hover */
            box-shadow: 0 0 20px rgba(255, 193, 7, 0.6);
        }
        .timeline-item h4 {
            color: #ffc107; /* Yellow headings */
            font-size: 1.2rem;
            margin-bottom: 8px;
        }
        .timeline-item .date {
            color: #8bc34a; /* Green dates */
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .timeline-item p {
            color: #424242; /* Dark gray text */
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #8bc34a, #ffeb3b); /* Green to yellow */
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }
        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }
        .scroll-top:hover {
            transform: scale(1.1) rotate(360deg);
            box-shadow: 0 8px 20px rgba(255, 193, 7, 0.4);
        }
        .scroll-top::before {
            content: '↑';
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        /* Install prompt with WHITE theme */
        .install-prompt {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: linear-gradient(45deg, #ffffff, #fff9c4); /* White to light yellow */
            color: #2e7d32; /* Green text */
            padding: 15px 20px;
            border-radius: 15px;
            border: 2px solid #8bc34a; /* Green border */
            display: none;
            align-items: center;
            gap: 15px;
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.2);
            z-index: 1000;
        }
        .install-prompt.show {
            display: flex;
            animation: slideInLeft 0.5s ease;
        }
        @keyframes slideInLeft {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .install-btn {
            background: #ffeb3b; /* Yellow button */
            color: #2e7d32; /* Green text */
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .install-btn:hover {
            background: #8bc34a; /* Green on hover */
            color: white;
            transform: scale(1.05);
        }

        /* Footer with WHITE theme */
        footer {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #ffffff, #f0f4c3); /* White to light yellow-green */
            color: #2e7d32; /* Green text */
            font-size: 1rem;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            box-shadow: 0 -4px 12px rgba(255, 193, 7, 0.1);
            position: relative;
            overflow: hidden;
        }
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #8bc34a, #ffeb3b, #8bc34a); /* Green-yellow-green */
            animation: footerGlow 4s ease-in-out infinite;
        }
        @keyframes footerGlow {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        /* Responsive enhancements */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }
            .tagline {
                font-size: 1.1rem;
            }
            nav ul {
                gap: 1rem;
                padding: 10px 0;
            }
            nav a {
                font-size: 0.9rem;
                padding: 1rem 0.5rem;
            }
            section {
                padding: 50px 0;
            }
            section h2 {
                font-size: 2rem;
            }
            .card, .project-card, .skill-category {
                padding: 25px 20px 30px;
            }
            .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
            .tech-icon {
                width: 40px;
                height: 40px;
            }
            .modal-content {
                margin: 10px;
                padding: 30px 20px;
            }
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
            .install-prompt {
                left: 10px;
                right: 10px;
                bottom: 10px;
                flex-direction: column;
                text-align: center;
            }
            .chatbot-window {
                width: 300px;
                height: 400px;
            }
            .performance-dashboard {
                left: 10px;
                min-width: 200px;
            }
            .dashboard-toggle {
                left: 220px;
            }
            .score-display {
                left: 10px;
            }
        }
        @media (max-width: 480px) {
            header h1 {
                font-size: 2rem;
            }
            .tagline {
                font-size: 1rem;
            }
            nav ul {
                flex-direction: column;
                gap: 0;
            }
            nav a {
                display: block;
                text-align: center;
                border-bottom: 1px solid #f0f0f0;
            }
            .scroll-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
            .tech-icon {
                width: 35px;
                height: 35px;
                margin: 0 10px 10px 0;
            }
            .chatbot-window {
                width: 280px;
                height: 350px;
            }
        }
    </style>
</head>
<body>
    <!-- Gamification UI -->
    <div class="progress-indicator">
        <div class="progress-bar-fill" id="progressBarFill"></div>
    </div>
    
    <div class="score-display" id="scoreDisplay">
        <div class="label">Exploration Score</div>
        <div class="value" id="scoreValue">0</div>
    </div>
    
    <div class="achievement-popup" id="achievementPopup">
        <span class="icon">🏆</span>
        <span class="message" id="achievementMessage">Achievement Unlocked!</span>
    </div>

    <!-- Performance Dashboard -->
    <div class="dashboard-toggle" onclick="toggleDashboard()">📊 Dashboard</div>
    <div class="performance-dashboard" id="performanceDashboard">
        <h4>⚡ Performance Monitor</h4>
        <div class="metric">
            <span class="label">Load Time</span>
            <span class="value" id="loadTime">--ms</span>
            <span class="status good" id="loadStatus"></span>
        </div>
        <div class="metric">
            <span class="label">Memory Usage</span>
            <span class="value" id="memoryUsage">--MB</span>
            <span class="status good" id="memoryStatus"></span>
        </div>
        <div class="metric">
            <span class="label">FPS</span>
            <span class="value" id="fpsDisplay">60</span>
            <span class="status good" id="fpsStatus"></span>
        </div>
        <div class="metric">
            <span class="label">Network</span>
            <span class="value" id="networkSpeed">Online</span>
            <span class="status good" id="networkStatus"></span>
        </div>
        <div class="metric">
            <span class="label">Page Views</span>
            <span class="value" id="pageViews">1</span>
            <span class="status good"></span>
        </div>
        <div class="metric">
            <span class="label">Interactions</span>
            <span class="value" id="interactionCount">0</span>
            <span class="status good"></span>
        </div>
    </div>

    <!-- AI Chatbot -->
    <div class="chatbot-container">
        <button class="chatbot-toggle" id="chatbotToggle" onclick="toggleChatbot()">🤖</button>
        <div class="chatbot-window" id="chatbotWindow">
            <div class="chatbot-header">
                <div class="title">🤖 Ask me about Uddissh's projects!</div>
                <button class="chatbot-close" onclick="toggleChatbot()">×</button>
            </div>
            <div class="chatbot-messages" id="chatbotMessages">
                <div class="message bot">
                    <div class="avatar">🤖</div>
                    <div class="content">Hi! I'm your AI assistant. Ask me anything about Uddissh's electronics projects, skills, or experience!</div>
                </div>
            </div>
            <div class="typing-indicator" id="typingIndicator">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>
            <div class="chatbot-input">
                <input type="text" id="chatInput" placeholder="Ask about projects, skills, or experience..." />
                <button class="chatbot-send" onclick="sendMessage()">→</button>
            </div>
        </div>
    </div>

    <!-- Light matrix rain background -->
    <div class="matrix-rain" id="matrixRain"></div>
    
    <!-- Animated particle background -->
    <div class="particles" id="particles"></div>

    <!-- PWA Install Prompt -->
    <div class="install-prompt" id="installPrompt">
        <span>📱 Install this portfolio as an app!</span>
        <button class="install-btn" id="installBtn">Install</button>
        <button class="install-btn" onclick="document.getElementById('installPrompt').style.display='none'">Later</button>
    </div>

    <header>
        <div class="content">
            <h1>Uddissh Verma</h1>
            <div class="tagline" id="typewriter"></div>
            <p class="subtitle">Passionate about building innovative solutions in automation, robotics, and smart systems</p>
        </div>
    </header>
    
    <nav aria-label="Primary navigation" id="nav">
        <ul>
            <li><a href="#about" class="active">About Me</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    
    <main class="container" role="main">
        <section id="about" tabindex="-1">
            <h2>About Me</h2>
            <div class="card">
                <div style="display: flex; align-items: center; margin-bottom: 20px; flex-wrap: wrap; justify-content: center;">
                    <!-- ESP32 Custom Icon with WHITE theme colors -->
                    <svg class="tech-icon esp32-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="10" y="20" width="80" height="60" rx="5" fill="#8bc34a" stroke="#4caf50" stroke-width="2"/>
                        <rect x="20" y="30" width="60" height="40" rx="3" fill="#ffffff"/>
                        <circle cx="30" cy="40" r="3" fill="#ffeb3b"/>
                        <circle cx="50" cy="40" r="3" fill="#ffeb3b"/>
                        <circle cx="70" cy="40" r="3" fill="#ffeb3b"/>
                        <circle cx="30" cy="60" r="3" fill="#ffeb3b"/>
                        <circle cx="50" cy="60" r="3" fill="#ffeb3b"/>
                        <circle cx="70" cy="60" r="3" fill="#ffeb3b"/>
                        <rect x="5" y="35" width="10" height="3" fill="#8bc34a"/>
                        <rect x="5" y="42" width="10" height="3" fill="#8bc34a"/>
                        <rect x="5" y="49" width="10" height="3" fill="#8bc34a"/>
                        <rect x="5" y="56" width="10" height="3" fill="#8bc34a"/>
                        <rect x="85" y="35" width="10" height="3" fill="#8bc34a"/>
                        <rect x="85" y="42" width="10" height="3" fill="#8bc34a"/>
                        <rect x="85" y="49" width="10" height="3" fill="#8bc34a"/>
                        <rect x="85" y="56" width="10" height="3" fill="#8bc34a"/>
                        <text x="50" y="85" text-anchor="middle" fill="#2e7d32" font-size="8" font-family="monospace">ESP32</text>
                    </svg>

                    <!-- Raspberry Pi Custom Icon with WHITE theme colors -->
                    <svg class="tech-icon raspi-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="15" y="25" width="70" height="50" rx="8" fill="#8bc34a" stroke="#4caf50" stroke-width="2"/>
                        <rect x="25" y="35" width="50" height="30" rx="5" fill="#ffffff"/>
                        <circle cx="30" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="40" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="50" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="60" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="70" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="30" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="40" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="50" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="60" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="70" cy="55" r="2" fill="#ffeb3b"/>
                        <rect x="10" y="30" width="8" height="15" fill="#8bc34a"/>
                        <rect x="82" y="30" width="8" height="15" fill="#8bc34a"/>
                        <rect x="10" y="55" width="8" height="15" fill="#8bc34a"/>
                        <rect x="82" y="55" width="8" height="15" fill="#8bc34a"/>
                        <circle cx="22" cy="35" r="3" fill="#ff5722"/>
                        <circle cx="22" cy="65" r="3" fill="#8bc34a"/>
                        <text x="50" y="85" text-anchor="middle" fill="#2e7d32" font-size="8" font-family="monospace">Pi 5</text>
                    </svg>

                    <!-- Arduino Custom Icon with WHITE theme colors -->
                    <svg class="tech-icon arduino-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="15" y="30" width="70" height="40" rx="5" fill="#8bc34a" stroke="#4caf50" stroke-width="2"/>
                        <rect x="25" y="40" width="50" height="20" rx="3" fill="#ffffff"/>
                        <circle cx="30" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="40" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="50" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="60" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="70" cy="45" r="2" fill="#ffeb3b"/>
                        <circle cx="30" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="40" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="50" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="60" cy="55" r="2" fill="#ffeb3b"/>
                        <circle cx="70" cy="55" r="2" fill="#ffeb3b"/>
                        <rect x="10" y="35" width="8" height="3" fill="#8bc34a"/>
                        <rect x="10" y="42" width="8" height="3" fill="#8bc34a"/>
                        <rect x="10" y="55" width="8" height="3" fill="#8bc34a"/>
                        <rect x="10" y="62" width="8" height="3" fill="#8bc34a"/>
                        <rect x="82" y="35" width="8" height="3" fill="#8bc34a"/>
                        <rect x="82" y="42" width="8" height="3" fill="#8bc34a"/>
                        <rect x="82" y="55" width="8" height="3" fill="#8bc34a"/>
                        <rect x="82" y="62" width="8" height="3" fill="#8bc34a"/>
                        <rect x="45" y="25" width="10" height="8" fill="#ffffff"/>
                        <text x="50" y="85" text-anchor="middle" fill="#2e7d32" font-size="8" font-family="monospace">Arduino</text>
                    </svg>

                    <!-- Oscilloscope Custom Icon with WHITE theme colors -->
                    <svg class="tech-icon scope-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="10" y="20" width="80" height="60" rx="5" fill="#2e7d32" stroke="#8bc34a" stroke-width="2"/>
                        <rect x="15" y="25" width="70" height="40" rx="2" fill="#1b5e20" stroke="#8bc34a" stroke-width="1"/>
                        <path d="M20 45 Q35 35 50 45 T80 45" fill="none" stroke="#ffeb3b" stroke-width="2">
                            <animate attributeName="d" values="M20 45 Q35 35 50 45 T80 45;M20 45 Q35 55 50 45 T80 45;M20 45 Q35 35 50 45 T80 45" dur="2s" repeatCount="indefinite"/>
                        </path>
                        <circle cx="25" cy="70" r="3" fill="#ff5722"/>
                        <circle cx="40" cy="70" r="3" fill="#8bc34a"/>
                        <circle cx="55" cy="70" r="3" fill="#ffeb3b"/>
                        <circle cx="70" cy="70" r="3" fill="#ffffff"/>
                        <rect x="82" y="30" width="3" height="10" fill="#8bc34a"/>
                        <rect x="82" y="45" width="3" height="10" fill="#8bc34a"/>
                        <text x="50" y="90" text-anchor="middle" fill="#2e7d32" font-size="7" font-family="monospace">Oscilloscope</text>
                    </svg>

                    <!-- Robot Custom Icon with WHITE theme colors -->
                    <svg class="tech-icon robot-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="30" y="40" width="40" height="35" rx="8" fill="#8bc34a" stroke="#4caf50" stroke-width="2"/>
                        <circle cx="42" cy="52" r="4" fill="#ffffff"/>
                        <circle cx="58" cy="52" r="4" fill="#ffffff"/>
                        <rect x="45" y="62" width="10" height="3" rx="1" fill="#ffeb3b"/>
                        <circle cx="50" cy="30" r="8" fill="#4caf50" stroke="#8bc34a" stroke-width="2"/>
                        <rect x="48" y="22" width="4" height="8" fill="#ffeb3b"/>
                        <rect x="20" y="45" width="8" height="20" rx="4" fill="#ffffff"/>
                        <rect x="72" y="45" width="8" height="20" rx="4" fill="#ffffff"/>
                        <rect x="35" y="78" width="8" height="15" rx="4" fill="#8bc34a"/>
                        <rect x="57" y="78" width="8" height="15" rx="4" fill="#8bc34a"/>
                        <circle cx="40" cy="50" r="2" fill="#ff5722">
                            <animate attributeName="fill" values="#ff5722;#ffeb3b;#ff5722" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="60" cy="50" r="2" fill="#ff5722">
                            <animate attributeName="fill" values="#ff5722;#ffeb3b;#ff5722" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <text x="50" y="95" text-anchor="middle" fill="#2e7d32" font-size="8" font-family="monospace">Robot</text>
                    </svg>

                    <!-- KiCad PCB Icon with WHITE theme colors -->
                    <svg class="tech-icon kicad-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="10" y="10" width="80" height="80" rx="5" fill="#8bc34a" stroke="#4caf50" stroke-width="2"/>
                        <path d="M20 20 L80 20 L80 80 L20 80 Z" fill="none" stroke="#ffeb3b" stroke-width="1"/>
                        <circle cx="25" cy="25" r="3" fill="#ffffff"/>
                        <circle cx="75" cy="25" r="3" fill="#ffffff"/>
                        <circle cx="25" cy="75" r="3" fill="#ffffff"/>
                        <circle cx="75" cy="75" r="3" fill="#ffffff"/>
                        <path d="M25 25 L50 40 L75 25" fill="none" stroke="#ffeb3b" stroke-width="2"/>
                        <path d="M25 75 L50 60 L75 75" fill="none" stroke="#ffeb3b" stroke-width="2"/>
                        <path d="M25 25 L25 75" fill="none" stroke="#ffeb3b" stroke-width="2"/>
                        <path d="M75 25 L75 75" fill="none" stroke="#ffeb3b" stroke-width="2"/>
                        <rect x="45" y="35" width="10" height="30" fill="#ffc107"/>
                        <circle cx="35" cy="50" r="5" fill="#ff5722"/>
                        <circle cx="65" cy="50" r="5" fill="#ff5722"/>
                        <text x="50" y="95" text-anchor="middle" fill="#2e7d32" font-size="8" font-family="monospace">KiCad</text>
                    </svg>
                </div>
                
                <!-- 3D PCB Visualization -->
                <div class="pcb-3d-container">
                    <div class="pcb-3d" onclick="addScore(5, 'PCB Explorer')">
                        <div class="pcb-face pcb-front">PCB Front</div>
                        <div class="pcb-face pcb-back">Components</div>
                        <div class="pcb-face pcb-right"></div>
                        <div class="pcb-face pcb-left"></div>
                        <div class="pcb-face pcb-top"></div>
                        <div class="pcb-face pcb-bottom"></div>
                    </div>
                </div>

                <!-- Circuit Animation -->
                <div class="circuit-animation">
                    <div class="trace trace-h trace-1"></div>
                    <div class="trace trace-h trace-2"></div>
                    <div class="trace trace-h trace-3"></div>
                    <div class="trace trace-h trace-4"></div>
                    <div class="trace trace-h trace-5"></div>
                    <div class="trace trace-h trace-6"></div>
                    
                    <div class="component resistor comp-1">R1</div>
                    <div class="component capacitor comp-2">C1</div>
                    <div class="component resistor comp-3">R2</div>
                    <div class="component capacitor comp-4">C2</div>
                    <div class="component ic comp-5">IC1</div>
                    
                    <div class="current-flow" style="top: 28px; left: 18px;"></div>
                </div>
                
                <!-- Statistics Dashboard -->
                <div class="stats-grid">
                    <div class="stat-card" onclick="addScore(2, 'Stat Viewer')">
                        <div class="stat-number" style="--target: 25">25</div>
                        <div class="stat-label">Projects Completed</div>
                    </div>
                    <div class="stat-card" onclick="addScore(2, 'PCB Counter')">
                        <div class="stat-number" style="--target: 8">8</div>
                        <div class="stat-label">PCBs Designed</div>
                    </div>
                    <div class="stat-card" onclick="addScore(2, 'Competition Tracker')">
                        <div class="stat-number" style="--target: 5">5</div>
                        <div class="stat-label">Competitions</div>
                    </div>
                    <div class="stat-card" onclick="addScore(2, 'Tech Master')">
                        <div class="stat-number" style="--target: 15">15</div>
                        <div class="stat-label">Technologies</div>
                    </div>
                </div>
                
                <p>
                    Hello! I'm <strong>Uddissh Verma</strong>, a passionate <strong>Class 12 student</strong> with an advanced expertise in 
                    <strong>Electronics Engineering, Robotics, IoT Systems, and Embedded Programming</strong>. With extensive hands-on 
                    experience in PCB design, automation platforms, and competitive robotics, I specialize in creating innovative 
                    solutions that bridge hardware and software.
                </p>
                <p>
                    My journey spans from designing custom PCBs in <strong>KiCad</strong> to building complex automation systems 
                    using <strong>Raspberry Pi, ESP32, and Arduino ecosystems</strong>. I have participated in robotics competitions, 
                    developed energy monitoring systems, and created full-stack web applications with authentication systems. 
                    My work focuses on making technology accessible, smart, and efficient.
                </p>
                <p>
                    Currently, I'm advancing my skills in <strong>AI integration, N8N workflow automation, and advanced motor control systems</strong>. 
                    My vision is to contribute to the future of smart automation and robotics through innovative engineering solutions.
                </p>
            </div>
        </section>

        <!-- Additional sections would continue with similar white theme styling... -->

    </main>
    
    <!-- Scroll to top button -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top"></button>
    
    <footer>
        <p>© <?php echo date("Y"); ?> Uddissh Verma | Innovative Electronics & Robotics Solutions</p>
        <p style="margin-top: 10px; font-size: 0.9rem; opacity: 0.8;">
            Passionate about building the future through technology and automation
        </p>
    </footer>
    
    <script>
        // Gamification System
        let userScore = 0;
        let interactions = 0;
        let achievements = {
            'First Visit': false,
            'Explorer': false,
            'Tech Enthusiast': false,
            'Portfolio Master': false,
            'Section Completionist': false,
            'Interaction Expert': false
        };

        function addScore(points, achievement = null) {
            userScore += points;
            interactions++;
            document.getElementById('scoreValue').textContent = userScore;
            document.getElementById('interactionCount').textContent = interactions;
            updateProgress();
            
            if (achievement && !achievements[achievement]) {
                achievements[achievement] = true;
                showAchievement(achievement);
            }
            
            // Check for milestone achievements
            if (userScore >= 50 && !achievements['Explorer']) {
                achievements['Explorer'] = true;
                showAchievement('Explorer - 50 Points!');
            }
            if (userScore >= 100 && !achievements['Tech Enthusiast']) {
                achievements['Tech Enthusiast'] = true;
                showAchievement('Tech Enthusiast - 100 Points!');
            }
            if (userScore >= 200 && !achievements['Portfolio Master']) {
                achievements['Portfolio Master'] = true;
                showAchievement('Portfolio Master - 200 Points!');
            }
        }

        function showAchievement(message) {
            const popup = document.getElementById('achievementPopup');
            document.getElementById('achievementMessage').textContent = message;
            popup.classList.add('show');
            
            setTimeout(() => {
                popup.classList.remove('show');
            }, 3000);
        }

        function updateProgress() {
            const sections = document.querySelectorAll('section').length;
            const viewedSections = document.querySelectorAll('section.viewed').length;
            const progress = (viewedSections / sections) * 100;
            document.getElementById('progressBarFill').style.width = progress + '%';
        }

        // AI Chatbot System
        const knowledgeBase = {
            'projects': {
                'shark': 'The SHARK Security Rover is an advanced mobile home security system featuring ESP-NOW communication, swarm bot coordination, and Raspberry Pi AI-based threat detection. It includes real-time monitoring and autonomous patrol capabilities.',
                'esc': 'Custom ESC PCB Design is a bidirectional, dual-channel, high-current Electronic Speed Controller PCB for RC soccer cars, featuring BTS7960 motor drivers, power filtering, and ESP32 integration.',
                'automation': 'Smart Home Automation system uses Raspberry Pi 5, Home Assistant, ESPHome, and gesture-based control via webcam, including energy monitoring and N8N workflow automation.',
                'rc car': 'Smart RC Car Platform is ESP32-powered with mecanum wheels, advanced motor drivers, web-based control panel, and real-time telemetry for robotics competitions.',
                'environmental': 'Environmental Monitoring System is an IoT-based energy monitoring solution for educational institutions that tracks classroom energy consumption.',
                'drone': 'FPV Racing Drone is custom-built using FlySky FS-i6 controller, SpeedyBee F405 flight controller, and TBS Unify Pro VTX for racing performance.',
                'web': 'Full-Stack Web Applications are professional Flask-based applications with admin authentication, user session management, and Raspberry Pi deployment.',
                'n8n': 'N8N Automation Workflows is an advanced system using N8N, integrated with AI models via Ollama for automated content generation.'
            },
            'skills': {
                'pcb': 'Uddissh has 90% expertise in PCB Design using KiCad 9.0, specializing in high-current applications and embedded system integration.',
                'python': 'Uddissh has 92% proficiency in Python programming, used for automation, web development, and AI integration.',
                'esp32': 'Uddissh has 88% expertise with ESP32 microcontrollers, used in IoT projects and robotics applications.',
                'raspberry pi': 'Uddissh has 90% proficiency with Raspberry Pi, particularly Pi 5 for home automation and hosting applications.',
                'arduino': 'Uddissh has 85% expertise with Arduino ecosystem for embedded programming and prototyping.',
                'robotics': 'Uddissh has 90% expertise in robotics, including competition robots, autonomous systems, and motor control.',
                'kicad': 'Uddissh has 92% proficiency in KiCad 9.0 for PCB design and electronic circuit development.'
            },
            'experience': {
                'competitions': 'Uddissh actively participates in robotics competitions including Robo Soccer and Technoxian World Robot Challenge (WRC) in India.',
                'education': 'Uddissh is currently a Class 12 student with advanced expertise in Electronics Engineering and Robotics.',
                'timeline': 'From 2024-2025, Uddissh has been involved in robotics competitions, PCB design projects, IoT development, and environmental awareness projects.'
            }
        };

        function getBotResponse(message) {
            const msg = message.toLowerCase();
            
            // Check for greetings
            if (msg.includes('hello') || msg.includes('hi') || msg.includes('hey')) {
                return "Hello! I'm here to help you learn about Uddissh's amazing electronics and robotics projects. What would you like to know?";
            }
            
            // Check for project queries
            for (const [key, value] of Object.entries(knowledgeBase.projects)) {
                if (msg.includes(key)) {
                    return value + " Would you like to know more about any specific aspect?";
                }
            }
            
            // Check for skill queries
            for (const [key, value] of Object.entries(knowledgeBase.skills)) {
                if (msg.includes(key)) {
                    return value + " This skill is used across multiple projects in the portfolio.";
                }
            }
            
            // Check for experience queries
            for (const [key, value] of Object.entries(knowledgeBase.experience)) {
                if (msg.includes(key)) {
                    return value + " You can find more details in the Experience section.";
                }
            }
            
            // General responses
            if (msg.includes('contact')) {
                return "You can contact Uddissh via email at uddissh.verma@gmail.com or check out his GitHub at github.com/Uddissh. He's always interested in collaborating on robotics and electronics projects!";
            }
            
            if (msg.includes('about')) {
                return "Uddissh is a passionate Class 12 student with advanced expertise in Electronics Engineering, Robotics, IoT Systems, and Embedded Programming. He specializes in PCB design, automation platforms, and competitive robotics.";
            }
            
            // Default response
            return "That's an interesting question! I can tell you about Uddissh's projects (SHARK rover, ESC PCB, automation, etc.), skills (PCB design, Python, ESP32, etc.), or experience. What specific area interests you?";
        }

        function toggleChatbot() {
            const window = document.getElementById('chatbotWindow');
            window.classList.toggle('show');
            if (window.classList.contains('show')) {
                document.getElementById('chatInput').focus();
                addScore(3, 'Chatbot User');
            }
        }

        function sendMessage() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            if (!message) return;
            
            // Add user message
            addMessage(message, 'user');
            input.value = '';
            
            // Show typing indicator
            document.getElementById('typingIndicator').classList.add('show');
            
            // Simulate AI thinking time
            setTimeout(() => {
                document.getElementById('typingIndicator').classList.remove('show');
                const response = getBotResponse(message);
                addMessage(response, 'bot');
                addScore(2, 'AI Conversationalist');
            }, 1000 + Math.random() * 2000);
        }

        function addMessage(content, sender) {
            const messagesContainer = document.getElementById('chatbotMessages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${sender}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'avatar';
            avatar.textContent = sender === 'user' ? '👤' : '🤖';
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'content';
            contentDiv.textContent = content;
            
            messageDiv.appendChild(avatar);
            messageDiv.appendChild(contentDiv);
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        // Performance Dashboard System
        let performanceMetrics = {
            loadTime: 0,
            memoryUsage: 0,
            fps: 60,
            networkSpeed: 'Online',
            pageViews: 1,
            interactions: 0
        };

        function updatePerformanceMetrics() {
            // Load time
            if (window.performance && window.performance.timing) {
                const loadTime = window.performance.timing.loadEventEnd - window.performance.timing.navigationStart;
                performanceMetrics.loadTime = loadTime;
                document.getElementById('loadTime').textContent = loadTime + 'ms';
                
                const loadStatus = document.getElementById('loadStatus');
                if (loadTime < 1000) {
                    loadStatus.className = 'status good';
                } else if (loadTime < 3000) {
                    loadStatus.className = 'status warning';
                } else {
                    loadStatus.className = 'status error';
                }
            }
            
            // Memory usage (estimation)
            if (window.performance && window.performance.memory) {
                const memoryMB = Math.round(window.performance.memory.usedJSHeapSize / 1024 / 1024);
                performanceMetrics.memoryUsage = memoryMB;
                document.getElementById('memoryUsage').textContent = memoryMB + 'MB';
                
                const memoryStatus = document.getElementById('memoryStatus');
                if (memoryMB < 50) {
                    memoryStatus.className = 'status good';
                } else if (memoryMB < 100) {
                    memoryStatus.className = 'status warning';
                } else {
                    memoryStatus.className = 'status error';
                }
            }
            
            // FPS monitoring
            let lastTime = performance.now();
            let frameCount = 0;
            
            function updateFPS() {
                frameCount++;
                const currentTime = performance.now();
                
                if (currentTime - lastTime >= 1000) {
                    const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));
                    document.getElementById('fpsDisplay').textContent = fps;
                    
                    const fpsStatus = document.getElementById('fpsStatus');
                    if (fps >= 30) {
                        fpsStatus.className = 'status good';
                    } else if (fps >= 15) {
                        fpsStatus.className = 'status warning';
                    } else {
                        fpsStatus.className = 'status error';
                    }
                    
                    frameCount = 0;
                    lastTime = currentTime;
                }
                
                requestAnimationFrame(updateFPS);
            }
            requestAnimationFrame(updateFPS);
            
            // Network status
            document.getElementById('networkSpeed').textContent = navigator.onLine ? 'Online' : 'Offline';
            document.getElementById('networkStatus').className = navigator.onLine ? 'status good' : 'status error';
        }

        function toggleDashboard() {
            const dashboard = document.getElementById('performanceDashboard');
            dashboard.classList.toggle('show');
            if (dashboard.classList.contains('show')) {
                addScore(5, 'Performance Monitor');
            }
        }

        // Enhanced interaction tracking
        document.addEventListener('click', function(e) {
            interactions++;
            document.getElementById('interactionCount').textContent = interactions;
            
            if (interactions === 10 && !achievements['Interaction Expert']) {
                achievements['Interaction Expert'] = true;
                showAchievement('Interaction Expert - 10 Clicks!');
                addScore(10);
            }
        });

        // Section view tracking
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('viewed');
                    addScore(5, `Section: ${entry.target.id}`);
                    updateProgress();
                }
            });
        }, { threshold: 0.5 });

        // Enhanced matrix rain - very subtle on white
        function createMatrixRain() {
            const matrixContainer = document.getElementById('matrixRain');
            const characters = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン';
            const columnCount = Math.floor(window.innerWidth / 30); // Wider spacing
            
            for (let i = 0; i < columnCount; i++) {
                const column = document.createElement('div');
                column.className = 'matrix-column';
                column.style.left = i * 30 + 'px'; // Wider spacing
                column.style.animationDuration = (Math.random() * 5 + 3) + 's'; // Slower
                column.style.animationDelay = Math.random() * 3 + 's';
                
                let text = '';
                for (let j = 0; j < 15; j++) { // Fewer characters
                    text += characters.charAt(Math.floor(Math.random() * characters.length)) + '\n';
                }
                column.textContent = text;
                
                matrixContainer.appendChild(column);
            }
        }

        // Create animated particles - yellow on white
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30; // Fewer particles
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 25 + 's'; // Slower
                particle.style.animationDuration = (Math.random() * 15 + 20) + 's'; // Slower
                particlesContainer.appendChild(particle);
            }
        }

        // Typewriter effect
        function typeWriter() {
            const texts = [
                'Electronics Engineer | Robotics & IoT Specialist | Embedded Systems Developer',
                'PCB Designer | Arduino & ESP32 Expert | KiCad Professional',
                'Raspberry Pi Enthusiast | Home Automation Specialist | Competition Roboticist',
                'Python Developer | Flask Framework | Full-Stack Engineer'
            ];
            const typewriterElement = document.getElementById('typewriter');
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            
            function type() {
                const currentText = texts[textIndex];
                
                if (isDeleting) {
                    typewriterElement.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typewriterElement.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                }
                
                if (!isDeleting && charIndex === currentText.length) {
                    setTimeout(() => isDeleting = true, 2000);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                }
                
                const typeSpeed = isDeleting ? 50 : 100;
                setTimeout(type, typeSpeed);
            }
            
            type();
        }

        // Chatbot enter key support
        document.getElementById('chatInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            createMatrixRain();
            createParticles();
            typeWriter();
            updatePerformanceMetrics();
            
            // Observe all sections
            document.querySelectorAll('section').forEach(section => {
                sectionObserver.observe(section);
            });
            
            // First visit achievement
            setTimeout(() => {
                if (!achievements['First Visit']) {
                    achievements['First Visit'] = true;
                    showAchievement('Welcome! First Visit Achievement');
                    addScore(10);
                }
            }, 2000);
            
            // Make all sections visible
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('visible');
            });
            
            document.querySelectorAll('.grid').forEach(grid => {
                grid.classList.add('visible');
            });
        });
    </script>
            <section id="skills" tabindex="-1">
            <h2>Technical Skills</h2>
            <div class="grid grid-3">
                <div class="skill-category">
                    <h4>🔧 Hardware & Electronics</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>PCB Design (KiCad)</span><span>90%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="90"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Circuit Analysis</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Embedded Systems</span><span>88%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="88"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Motor Control</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                </div>
                <div class="skill-category">
                    <h4>💻 Programming & Development</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Python</span><span>92%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="92"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>C/C++ (Embedded)</span><span>87%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="87"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>HTML/CSS/JS</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Flask Framework</span><span>80%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="80"></div></div>
                    </div>
                </div>
                <div class="skill-category">
                    <h4>🤖 Platforms & Microcontrollers</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Raspberry Pi</span><span>90%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="90"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>ESP32</span><span>88%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="88"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Arduino</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Linux Systems</span><span>82%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="82"></div></div>
                    </div>
                </div>
                <div class="skill-category">
                    <h4>🏠 Automation & IoT</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Home Assistant</span><span>88%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="88"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>ESPHome</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>N8N Workflows</span><span>80%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="80"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Docker</span><span>75%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="75"></div></div>
                    </div>
                </div>
                <div class="skill-category">
                    <h4>🎯 Specialized Areas</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Robotics</span><span>90%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="90"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>FPV Drones</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>AI Integration</span><span>78%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="78"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Computer Vision</span><span>75%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="75"></div></div>
                    </div>
                </div>
                <div class="skill-category">
                    <h4>🛠️ Tools & Software</h4>
                    <div class="skill-progress">
                        <div class="skill-name"><span>KiCad 9.0</span><span>92%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="92"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Git/GitHub</span><span>85%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="85"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>3D Printing</span><span>80%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="80"></div></div>
                    </div>
                    <div class="skill-progress">
                        <div class="skill-name"><span>Test Equipment</span><span>88%</span></div>
                        <div class="progress-bar"><div class="progress-fill" data-width="88"></div></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="projects" tabindex="-1">
            <h2>Featured Projects</h2>
            <div class="grid grid-2">
                <div class="project-card" onclick="openModal('modal1'); addScore(3, 'Project Explorer')">
                    <h4>🦈 SHARK Security Rover</h4>
                    <div class="pcb-3d-container">
                        <div class="pcb-3d">
                            <div class="pcb-face pcb-front">🤖 AI Camera</div>
                            <div class="pcb-face pcb-back">ESP-NOW Mesh</div>
                            <div class="pcb-face pcb-right"></div>
                            <div class="pcb-face pcb-left"></div>
                            <div class="pcb-face pcb-top"></div>
                            <div class="pcb-face pcb-bottom"></div>
                        </div>
                    </div>
                    <p>Advanced mobile home security system featuring ESP-NOW communication, swarm bot coordination, and Raspberry Pi AI-based threat detection. Includes real-time monitoring and autonomous patrol capabilities.</p>
                    <div class="tech-stack">
                        <span>ESP32</span><span>Raspberry Pi</span><span>Computer Vision</span><span>ESP-NOW</span><span>Python</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal2'); addScore(3, 'PCB Designer')">
                    <h4>⚡ Custom ESC PCB Design</h4>
                    <div class="circuit-animation">
                        <div class="trace trace-h trace-1"></div>
                        <div class="trace trace-h trace-2"></div>
                        <div class="trace trace-h trace-3"></div>
                        <div class="trace trace-h trace-4"></div>
                        <div class="trace trace-h trace-5"></div>
                        <div class="trace trace-h trace-6"></div>
                        
                        <div class="component resistor comp-1">BTS</div>
                        <div class="component capacitor comp-2">C1</div>
                        <div class="component resistor comp-3">R2</div>
                        <div class="component capacitor comp-4">C2</div>
                        <div class="component ic comp-5">ESP32</div>
                        
                        <div class="current-flow" style="top: 28px; left: 18px;"></div>
                    </div>
                    <p>Bidirectional, dual-channel, high-current Electronic Speed Controller PCB for RC soccer cars. Features BTS7960 motor drivers, power filtering, and ESP32 integration with GPIO pin optimization.</p>
                    <div class="tech-stack">
                        <span>KiCad</span><span>BTS7960</span><span>ESP32</span><span>Motor Control</span><span>PCB Design</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal3'); addScore(3, 'IoT Master')">
                    <h4>🏠 Smart Home Automation</h4>
                    <p>Comprehensive home automation system using Raspberry Pi 5, Home Assistant, ESPHome, and gesture-based control via webcam. Includes energy monitoring and N8N workflow automation.</p>
                    <div class="tech-stack">
                        <span>Home Assistant</span><span>Raspberry Pi 5</span><span>ESPHome</span><span>N8N</span><span>Docker</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal4'); addScore(3, 'Robotics Pro')">
                    <h4>🎮 Smart RC Car Platform</h4>
                    <p>ESP32-powered RC car with mecanum wheels, advanced motor drivers, web-based control panel, and real-time telemetry. Features competitive-grade performance for robotics competitions.</p>
                    <div class="tech-stack">
                        <span>ESP32</span><span>Motor Drivers</span><span>Web Interface</span><span>Real-time Control</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal5'); addScore(3, 'Environmental Engineer')">
                    <h4>🌍 Environmental Monitoring System</h4>
                    <p>IoT-based energy monitoring solution for educational institutions. Tracks individual classroom energy consumption with real-time data visualization and environmental impact analysis.</p>
                    <div class="tech-stack">
                        <span>IoT Sensors</span><span>Data Analytics</span><span>Environmental Tracking</span><span>Flask</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal6'); addScore(3, 'Drone Pilot')">
                    <h4>🚁 FPV Racing Drone</h4>
                    <p>Custom-built FPV drone using FlySky FS-i6 controller, SpeedyBee F405 flight controller, and TBS Unify Pro VTX. Optimized for racing performance and aerial cinematography.</p>
                    <div class="tech-stack">
                        <span>Flight Controller</span><span>FPV System</span><span>Radio Control</span><span>Aerodynamics</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal7'); addScore(3, 'Full-Stack Developer')">
                    <h4>🌐 Full-Stack Web Applications</h4>
                    <p>Professional Flask-based web applications with admin authentication, user session management, and deployment on Raspberry Pi. Features secure hosting on non-standard ports.</p>
                    <div class="tech-stack">
                        <span>Flask</span><span>Python</span><span>Authentication</span><span>Raspberry Pi</span><span>Linux</span>
                    </div>
                </div>
                
                <div class="project-card" onclick="openModal('modal8'); addScore(3, 'Automation Expert')">
                    <h4>🔄 N8N Automation Workflows</h4>
                    <p>Advanced workflow automation system using N8N, integrated with AI models via Ollama. Includes automated content generation and system orchestration via Portainer.</p>
                    <div class="tech-stack">
                        <span>N8N</span><span>Ollama</span><span>Portainer</span><span>Automation</span><span>AI Integration</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="experience" tabindex="-1">
            <h2>Experience & Achievements</h2>
            <div class="card">
                <div class="timeline">
                    <div class="timeline-item" onclick="addScore(2, 'Timeline Explorer')">
                        <h4>Robotics Competition Participation</h4>
                        <div class="date">2024-2025</div>
                        <p>Active participant in robotics competitions including Robo Soccer and Technoxian World Robot Challenge (WRC) in India. Developed competitive robotics systems with advanced motor control and autonomous navigation.</p>
                    </div>
                    
                    <div class="timeline-item" onclick="addScore(2, 'PCB Master')">
                        <h4>Advanced PCB Design Projects</h4>
                        <div class="date">2024-2025</div>
                        <p>Designed and fabricated multiple custom PCBs using KiCad 9.0, including ESC controllers, sensor integration boards, and power management systems. Specialized in high-current applications and embedded system integration.</p>
                    </div>
                    
                    <div class="timeline-item" onclick="addScore(2, 'IoT Pioneer')">
                        <h4>IoT & Home Automation Development</h4>
                        <div class="date">2024-2025</div>
                        <p>Built comprehensive home automation systems using Raspberry Pi 5, ESP32, and various IoT sensors. Implemented energy monitoring solutions and gesture-based control systems.</p>
                    </div>
                    
                    <div class="timeline-item" onclick="addScore(2, 'Green Tech Advocate')">
                        <h4>Environmental Awareness Projects</h4>
                        <div class="date">2024</div>
                        <p>Developed web applications and IoT systems focused on environmental monitoring and awareness. Created educational tools for tracking energy consumption and promoting sustainability.</p>
                    </div>
                    
                    <div class="timeline-item" onclick="addScore(2, 'Web Developer')">
                        <h4>Competition Web Development</h4>
                        <div class="date">2024</div>
                        <p>Created full-stack web applications for competition projects, featuring user authentication, admin panels, and deployment on Raspberry Pi platforms with secure hosting configurations.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" tabindex="-1">
            <h2>Get In Touch</h2>
            <div class="card">
                <p style="text-align: center; font-size: 1.2rem; margin-bottom: 30px;">
                    Interested in collaborating on robotics projects, discussing IoT solutions, or exploring innovative electronics designs? 
                    Let's connect and build something amazing together!
                </p>
                
                <div class="grid grid-2" style="margin-top: 40px;">
                    <div>
                        <h3 style="color: #2e7d32; margin-bottom: 25px;">📞 Contact Information</h3>
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 1.1rem;">
                            <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px; padding: 15px; background: linear-gradient(145deg, #ffffff, #fff9c4); border-radius: 12px; border: 2px solid #f0f4c3; transition: all 0.3s ease;" onclick="addScore(1, 'Contact Info')">
                                <svg style="width: 24px; height: 24px; fill: #ffc107;" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                <div>
                                    <strong>Email:</strong><br>
                                    <a href="mailto:uddissh.verma@gmail.com" style="color: #388e3c;">uddissh.verma@gmail.com</a>
                                </div>
                            </li>
                            <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px; padding: 15px; background: linear-gradient(145deg, #ffffff, #fff9c4); border-radius: 12px; border: 2px solid #f0f4c3; transition: all 0.3s ease;" onclick="addScore(1, 'GitHub Visitor')">
                                <svg style="width: 24px; height: 24px; fill: #ffc107;" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12c0 4.42 2.87 8.17 6.84 9.5.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.71-2.78.6-3.37-1.34-3.37-1.34-.45-1.15-1.1-1.46-1.1-1.46-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.08.63-1.33-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02A9.56 9.56 0 0112 6.8c.85.004 1.7.115 2.5.337 1.9-1.29 2.74-1.02 2.74-1.02.56 1.38.21 2.4.1 2.65.64.7 1.03 1.59 1.03 2.68 0 3.85-2.34 4.7-4.57 4.95.36.31.68.92.68 1.85 0 1.33-.01 2.4-.01 2.73 0 .27.18.58.69.48A10.01 10.01 0 0022 12c0-5.52-4.48-10-10-10z"/>
                                </svg>
                                <div>
                                    <strong>GitHub:</strong><br>
                                    <a href="https://github.com/Uddissh" target="_blank" rel="noopener noreferrer" style="color: #388e3c;">github.com/Uddissh</a>
                                </div>
                            </li>
                            <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px; padding: 15px; background: linear-gradient(145deg, #ffffff, #fff9c4); border-radius: 12px; border: 2px solid #f0f4c3; transition: all 0.3s ease;">
                                <svg style="width: 24px; height: 24px; fill: #ffc107;" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <div>
                                    <strong>Location:</strong><br>
                                    India
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 style="color: #2e7d32; margin-bottom: 25px;">💬 Send Message</h3>
                        <form class="contact-form" id="contactForm">
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <input type="text" id="subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" required placeholder="Tell me about your project ideas, collaboration opportunities, or technical questions..."></textarea>
                            </div>
                            <button type="submit" class="form-submit">Send Message</button>
                            <div class="form-message" id="formMessage"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <!-- Project Modals -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal1')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🦈 SHARK Security Rover - Detailed Overview</h3>
            <p><strong>Project Duration:</strong> 6 months (2024)</p>
            <p><strong>Team Size:</strong> Solo Project</p>
            
            <h4 style="color: #2e7d32;">Technical Specifications:</h4>
            <ul style="margin-left: 20px; color: #424242;">
                <li><strong>Main Controller:</strong> ESP32 DevKit v1 with dual-core processor</li>
                <li><strong>Communication:</strong> ESP-NOW protocol for mesh networking</li>
                <li><strong>AI Processing:</strong> Raspberry Pi 4B with OpenCV integration</li>
                <li><strong>Sensors:</strong> Ultrasonic sensors, PIR motion detectors, camera module</li>
                <li><strong>Motor System:</strong> 4-wheel drive with precision encoders</li>
                <li><strong>Power Management:</strong> Custom battery management system with 18650 cells</li>
            </ul>
            
            <h4 style="color: #2e7d32;">Key Features:</h4>
            <ul style="margin-left: 20px; color: #424242;">
                <li>Autonomous patrol routes with obstacle avoidance</li>
                <li>Real-time video streaming to mobile dashboard</li>
                <li>Swarm coordination with multiple rover units</li>
                <li>Machine learning-based threat detection</li>
                <li>Emergency alert system with SMS notifications</li>
                <li>Night vision capabilities with IR illumination</li>
            </ul>
            
            <h4 style="color: #2e7d32;">Challenges Overcome:</h4>
            <ul style="margin-left: 20px; color: #424242;">
                <li>Implemented efficient power management for 8+ hours operation</li>
                <li>Developed custom ESP-NOW mesh protocol for reliable communication</li>
                <li>Optimized computer vision algorithms for real-time processing</li>
                <li>Created robust mechanical chassis design for outdoor operation</li>
            </ul>
            
            <p style="margin-top: 25px;"><strong>Current Status:</strong> Prototype completed, testing phase in progress</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal2')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">⚡ Custom ESC PCB Design - Engineering Details</h3>
            <p><strong>Project Duration:</strong> 4 months (2024-2025)</p>
            <p><strong>Application:</strong> RC Soccer Car Competition</p>
            
            <h4 style="color: #2e7d32;">PCB Specifications:</h4>
            <ul style="margin-left: 20px; color: #424242;">
                <li><strong>Board Size:</strong> 80mm x 60mm, 4-layer PCB design</li>
                <li><strong>Motor Drivers:</strong> Dual BTS7960 high-current H-bridge modules</li>
                <li><strong>Current Rating:</strong> 43A continuous, 86A peak per channel</li>
                <li><strong>Voltage Range:</strong> 6V - 27V operating voltage</li>
                <li><strong>Control Interface:</strong> ESP32 GPIO pins 16-19 for PWM control</li>
                <li><strong>Protection:</strong> Overcurrent, thermal, and reverse polarity protection</li>
            </ul>
            
            <p style="margin-top: 25px;"><strong>Status:</strong> Production PCBs fabricated and tested successfully</p>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal3')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🏠 Smart Home Automation - System Architecture</h3>
            <p><strong>Platform:</strong> Raspberry Pi 5 with 8GB RAM</p>
            <p><strong>Key Components:</strong> Home Assistant, ESPHome, N8N, Docker</p>
            
            <h4 style="color: #2e7d32;">Features:</h4>
            <ul style="margin-left: 20px; color: #424242;">
                <li>Gesture-based control via webcam</li>
                <li>Energy monitoring and optimization</li>
                <li>Automated workflow orchestration</li>
                <li>Multi-device synchronization</li>
            </ul>
            
            <p style="margin-top: 25px;"><strong>Status:</strong> Operational with continuous feature additions</p>
        </div>
    </div>

    <div id="modal4" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal4')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🎮 Smart RC Car Platform - Competition Ready</h3>
            <p><strong>Competition:</strong> Robo Soccer & Technoxian WRC</p>
            <p><strong>Features:</strong> Mecanum wheels, web control, real-time telemetry</p>
            <p style="margin-top: 25px;"><strong>Achievement:</strong> Top performance in regional robotics competitions</p>
        </div>
    </div>

    <div id="modal5" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal5')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🌍 Environmental Monitoring System</h3>
            <p><strong>Application:</strong> Educational Institution Energy Tracking</p>
            <p><strong>Technology:</strong> IoT sensors, data analytics, Flask web interface</p>
            <p style="margin-top: 25px;"><strong>Impact:</strong> Achieved 15% energy reduction in pilot classroom</p>
        </div>
    </div>

    <div id="modal6" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal6')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🚁 FPV Racing Drone Build</h3>
            <p><strong>Category:</strong> 5-inch Racing Quadcopter</p>
            <p><strong>Components:</strong> FlySky FS-i6, SpeedyBee F405, TBS Unify Pro VTX</p>
            <p style="margin-top: 25px;"><strong>Status:</strong> Active racing drone, continuously optimized for performance</p>
        </div>
    </div>

    <div id="modal7" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal7')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🌐 Full-Stack Web Applications</h3>
            <p><strong>Framework:</strong> Flask with Python backend</p>
            <p><strong>Features:</strong> Admin authentication, user sessions, Raspberry Pi deployment</p>
            <p style="margin-top: 25px;"><strong>Status:</strong> Multiple applications deployed and actively maintained</p>
        </div>
    </div>

    <div id="modal8" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('modal8')">&times;</span>
            <h3 style="color: #ffc107; margin-bottom: 20px;">🔄 N8N Automation Workflows</h3>
            <p><strong>Platform:</strong> Self-hosted on Raspberry Pi infrastructure</p>
            <p><strong>Integration:</strong> Ollama AI models, Portainer management</p>
            <p style="margin-top: 25px;"><strong>Status:</strong> Production workflows handling daily automation tasks</p>
        </div>
    </div>

<script>
    // Modal functions
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.classList.remove('show');
            document.body.style.overflow = 'auto';
        }
    }

    // Contact form handling
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.querySelector('.form-submit');
        const messageDiv = document.getElementById('formMessage');
        
        submitBtn.textContent = 'Sending...';
        submitBtn.classList.add('loading');
        
        // Simulate form submission (replace with actual endpoint)
        try {
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            messageDiv.textContent = 'Thank you! Your message has been sent successfully. I\'ll get back to you soon!';
            messageDiv.className = 'form-message success';
            messageDiv.style.display = 'block';
            
            this.reset();
            addScore(10, 'Message Sent');
            
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 5000);
            
        } catch (error) {
            messageDiv.textContent = 'Sorry, there was an error sending your message. Please try again or contact me directly via email.';
            messageDiv.className = 'form-message error';
            messageDiv.style.display = 'block';
        }
        
        submitBtn.textContent = 'Send Message';
        submitBtn.classList.remove('loading');
    });

    // Animate skill progress bars
    function animateSkillBars() {
        const progressBars = document.querySelectorAll('.progress-fill');
        progressBars.forEach((bar, index) => {
            setTimeout(() => {
                const width = bar.getAttribute('data-width');
                bar.style.width = width + '%';
            }, index * 100);
        });
    }

    // Enhanced smooth scroll with active nav updates
    document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.focus({preventScroll: false});
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                document.querySelectorAll('nav a').forEach(link => link.classList.remove('active'));
                this.classList.add('active');
                addScore(1, 'Navigation');
            }
        });
    });

    // Scroll handling
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(() => {
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('nav a[href^="#"]');
                const nav = document.getElementById('nav');
                const scrollTop = document.getElementById('scrollTop');
                
                if (window.pageYOffset > 100) {
                    nav.classList.add('scrolled');
                    scrollTop.classList.add('visible');
                } else {
                    nav.classList.remove('scrolled');
                    scrollTop.classList.remove('visible');
                }
                
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 100;
                    if (pageYOffset >= sectionTop) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('active');
                    }
                });
                
                ticking = false;
            });
            ticking = true;
        }
    });

    // Scroll to top functionality
    document.getElementById('scrollTop').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        addScore(1, 'Top Scroller');
    });

    // Tech icon interactions with scoring
    document.querySelectorAll('.tech-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            this.style.transform = 'scale(1.4) rotate(25deg)';
            this.style.filter = 'drop-shadow(0 10px 20px rgba(255, 193, 7, 0.6))';
            setTimeout(() => {
                this.style.transform = '';
                this.style.filter = '';
            }, 400);
            addScore(1, 'Tech Icon Explorer');
        });
    });

    // Enhanced project card interactions
    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            addScore(1, 'Project Browser');
        });
    });

    // Initialize skill bars with delay for white theme
    setTimeout(() => {
        animateSkillBars();
    }, 1500);
</script>
</body>
</html>