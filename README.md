Event Espresso Beaver Builder Add-on
=========

[![License](https://img.shields.io/badge/License-GPLv2-blue.svg?style=flat)](https://www.gnu.org/licenses/gpl-2.0.html)
[![Beaver Builder 2 Addon](https://img.shields.io/badge/Addon%20For-Beaver%20Builder%202-orange.svg)](https://www.wpbeaverbuilder.com/?fla=1882)
[![Event Espresso Addon](https://img.shields.io/badge/Addon%20For-Event%20Espresso-blue.svg)](https://github.com/eventespresso/event-espresso-core)
[![Minimum EE Core Version:](https://img.shields.io/badge/Minimum%20EE%20core%20ver-4.9.37.p-red.svg)](https://github.com/eventespresso/event-espresso-core/releases/tag/4.9.37.p)

![beaver builder_ better together](https://user-images.githubusercontent.com/235315/33503724-085f028e-d6a2-11e7-8af1-44e4d8349fd7.png)

This plugin adds [Event Espresso 4](https://eventespresso.com/?utm_source=github&utm_medium=referral&utm_campaign=beaver_builder_event_espresso) event display and ticketing options to the [Beaver Builder](https://www.wpbeaverbuilder.com/?fla=1882) page builder plugin for WordPress. Currently, this version of the plugin adds a customizable event ticket selector and events list to Beaver Builder, while adding support for the Event Espresso 4 [Grid View](https://eventespresso.com/product/eea-events-grid-view-template/?utm_source=github&utm_medium=link&utm_campaign=ee_beaver_builder_addon_description_read_me&utm_content=grid+view) and [Table View](https://eventespresso.com/product/eea-events-table-view-template/?utm_source=github&utm_medium=link&utm_campaign=ee_beaver_builder_addon_description_read_me&utm_content=table+view) add-ons if either is installed. 

Feature Videos:
1. [Ticket Selector](https://youtu.be/iYmhj_chMVc)
2. [Events List](https://youtu.be/y55nmzQl2xc)
3. Grid View (Coming Soon)
4. Table View (Coming Soon)

Be sure to check out the [Beaver Builder Child Theme](http://espressothemes.com/downloads/barista-theme/) for Event Espresso.

> Note, **usage support** is not provided here. Please read the entire contents of this document before posting any issues.  If we encounter issues that give evidence of this document not having been read the issue _will be closed_.

| **Some Links**|     |
|---- | --- |
**Support** | Free support for this add-on is NOT provided through this repository. Please create a Github issue if you have questions or discover bugs or plugin incompatibilities. 
**Paid Support** | [Support tokens](https://eventespresso.com/product/premium-support-token/?utm_source=github&utm_medium=link&utm_campaign=ee_addon_description_readme&utm_content=premium+support+token) are available if you happen to get stuck. 
**Reporting Issues** | Please create a Github issue if you have questions or discover bugs or plugin incompatibilities. 
**Newsletter** | Be the first to know when we ship new features ... [signup here](https://eventespresso.com/newsletter/?utm_source=github&utm_medium=referral&utm_campaign=beaver_builder_event_espresso).
**Community Chat** | Join a real-time community chat group for professionals that are leading the way in events from event management, event technology and event marketing to work-life balance. [Join the Discussion →](https://eventsmart.com/contact/community-chat/?utm_source=github&utm_medium=link&utm_campaign=ee_addon_description_read_me&utm_content=community+chat)

## Developers
**This is the full version of the add-on** and provides its full feature set. The repository is provided to assist you with evaluating whether it will solve your use-case.  
> We ask if you are using this to provide a solution for clients that you (or your client) [purchase a support license](https://eventespresso.com/pricing/?ee_ver=ee4&utm_source=github&utm_medium=link&utm_campaign=ee_addon_description_readme&utm_content=premium+support+license) for Event Espresso 4.

**No Usage Support** is provided in this repository.

### Add-on Releases and Development
We follow a set pattern for releases and development of all our official add-ons:
1. Active development for new features happens on a **FET-{ticket-number}-{brief-description}** branch.  We continually merge master into the feature branch while it's in development.  Once it's complete, then testing is done on it and it's merged back to master ready for release.
2. Bug fixes are done on a **BUG-{ticket-number}-{brief-description}** branch.  Same methodology is used as with feature branches.
3. Master is technically always production ready and release ready but may not be equal to what the current stable release is for.
4. When we do an official release of an add-on, the current master is tagged and the release is the zip for that tag.

### Testing
For all testers of this add-on, please take note of the following when reporting issues.
1. There is a difference between a feature and a bug, we consider a bug is something that reveals brokenness in intended functionality.  A feature, is something beyond intended functionality.  To help determine the difference, think about your issue like this, "I know A does C, however I *wish* it did D."  If you find yourself saying that, its a feature.  This repository is **not** the place to suggest a new feature UNLESS you've already got a pull request to implement it (see pull requests section below).  Info on sponsoring new features can [be found here](https://eventespresso.com/rich-features/sponsor-new-features/?utm_source=github&utm_medium=referral&utm_campaign=beaver_builder_event_espresso).  If you aren't sure whether something is a feature or bug feel free to post the issue - however we give priority to bug issues here.
2. UI/UX issues may be considered a bug but not if it requires a major change in design.  Feel free to report things you find confusing or needing improvement however reports accompanied by a pull request will likely get faster attention.
3. Report your issue as clearly as possible.  By "clear" we mean:

	i. Specify the branch this occurred in.

	ii. Be specific about the steps you took to reproduce.

	iii. Feel free to use screenshots/screencasts to illustrate

	iv. Use URLs for the page the issue to place on where possible.

1. Don't "bump" bug reports if we don't respond right away.  We see every report coming in, but we'll only reply if we need clarification or if we think its invalid.  Otherwise, we're likely working on a fix and the issue will be updated when the fix is complete.

### Pull Requests
One of the reasons we created this private repo on GitHub is because we wanted to open up EE development to 3rd party developers who might want to contribute to the codebase. GitHub makes this really easy to do so via pull requests.  If you don't know what pull requests are, please read up on them via the GitHub help/documentation.

Here's how we deal with pull requests for our repo:

1. Any new FEATURES in a pull request should be based off of the *master* branch. If your feature pull request is based off any other branch it will not be considered.
2. Any BUGFIX pull requests should be based off of the branch the bug was found.  Please verify if it is in master before submitting the pull request.  If it is in reproducible on master, then the pull-request should be based off of master.
3. We greatly appreciate any pull-requests submitted for consideration, but please understand we are very selective in what we decide to include in our official add-ons.  If the "feature" is something that expands too much on our design decisions for this add-on then we may suggest you develop your pull request into a different add-on for EE.


You may find [our post on contributing to open source software](https://eventespresso.com/2017/02/5-tips-for-contributing-to-open-source-software-like-event-espresso/?utm_source=github&utm_medium=referral&utm_campaign=beaver_builder_event_espresso) helpful.
