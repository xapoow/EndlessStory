# Endless Story

## Overview

**Endless Story** is a web application where users can contribute to a collaborative, ongoing story.  
Each user can add their own sentence or phrase to an existing story, continuing the narrative.

The platform enforces rules for submissions:

- Each sentence must be **between 50 and 200 characters**.
- Sentences must be **logical continuations** of the previous sentence.
- Each sentence must end with a **period**.

Users must **register and log in** before submitting content.

---

## Features

### User Features

- Registration and login system.
- Submit a new sentence to the collaborative story.
- View the current story in real time.
- Validation of sentence length and logical continuation rules.

### Admin / Management (optional)

- Manage users (if admin panel is implemented).
- Moderate or remove inappropriate submissions.

---

## Technology Stack

**Frontend:**

- HTML / CSS
- JavaScript
- Lightweight, responsive design

**Backend:**

- PHP 
- MySQL

**Hosting:**

- Currently deployed on [42web](https://42web.io)

---

## Rules for Contributions

1. Each submission must be **50–200 characters**.
2. Sentences must **logically continue the previous content**.
3. End every submission with a **period**.

---

## Notes

- Ensure proper user authentication.
- Protect against SQL injection and XSS attacks.
- Store passwords securely using hashing (bcrypt or similar).
