<ul>
    <!-- NAV ITEM - DASHBOARD COLLAPSE MENU-->
    @if (in_array('admin', user_roles()) ||
            $sidebarUserPermissions['view_overview_dashboard'] == 4 ||
            $sidebarUserPermissions['view_project_dashboard'] == 4 ||
            $sidebarUserPermissions['view_client_dashboard'] == 4 ||
            $sidebarUserPermissions['view_hr_dashboard'] == 4 ||
            $sidebarUserPermissions['view_ticket_dashboard'] == 4 ||
            $sidebarUserPermissions['view_finance_dashboard'] == 4)
        <x-menu-item icon="house-fill" :text="__('app.menu.dashboard')">

            <div class="accordionItemContent">
                <x-sub-menu-item :link="route('dashboard')" :text="__('app.menu.privateDashboard')" />
                <x-sub-menu-item :link="route('dashboard.advanced')" :text="__('app.menu.advanceDashboard')" />
            </div>
        </x-menu-item>
    @else
        <x-menu-item icon="house-fill" :text="__('app.menu.dashboard')" :link="route('dashboard')">

        </x-menu-item>
    @endif

    <!-- NAV ITEM - HR COLLAPASE MENU -->
    @if (
        !in_array('client', user_roles()) &&
            in_array('leads', user_modules()) &&
            (($sidebarUserPermissions['view_lead'] != 5 && $sidebarUserPermissions['view_lead'] != 'none') ||
                ($sidebarUserPermissions['view_deals'] != 5 && $sidebarUserPermissions['view_deals'] != 'none')))
        <x-menu-item icon="person-plus-fill" :text="__('app.menu.lead')">

            @if ($sidebarUserPermissions['view_lead'] != 5 && $sidebarUserPermissions['view_lead'] != 'none')
                <div class="accordionItemContent ">
                    <x-sub-menu-item :link="route('lead-contact.index')" :text="__('app.leadContact')" />
                </div>
            @endif
            @if ($sidebarUserPermissions['view_deals'] != 5 && $sidebarUserPermissions['view_deals'] != 'none')
                <div class="accordionItemContent ">
                    <x-sub-menu-item :link="route('deals.index')" :text="__('app.deal')" />
                </div>
            @endif
        </x-menu-item>
    @endif


    @if (
        !in_array('client', user_roles()) &&
            in_array('clients', user_modules()) &&
            $sidebarUserPermissions['view_clients'] != 5 &&
            $sidebarUserPermissions['view_clients'] != 'none')
        <x-menu-item icon="people-fill" :text="__('app.menu.clients')" :link="route('clients.index')">

        </x-menu-item>
    @endif

    <!-- NAV ITEM - HR COLLAPASE MENU -->
    @if (
        !in_array('client', user_roles()) &&
            (in_array('employees', user_modules()) ||
                in_array('leaves', user_modules()) ||
                in_array('attendance', user_modules()) ||
                in_array('holidays', user_modules())) &&
            ($sidebarUserPermissions['view_employees'] != 5 ||
                $sidebarUserPermissions['view_leave'] != 5 ||
                $sidebarUserPermissions['view_attendance'] != 5 ||
                $sidebarUserPermissions['view_holiday'] != 5) &&
            ($sidebarUserPermissions['view_employees'] != 'none' ||
                $sidebarUserPermissions['view_leave'] != 'none' ||
                $sidebarUserPermissions['view_attendance'] != 'none' ||
                $sidebarUserPermissions['view_holiday'] != 'none' ||
                $sidebarUserPermissions['view_shift_roster'] != 'none'))
        <x-menu-item icon="person-lines-fill" :text="__('app.menu.hr')">

            <div class="accordionItemContent">
                @if (in_array('employees', user_modules()) &&
                        $sidebarUserPermissions['view_employees'] != 5 &&
                        $sidebarUserPermissions['view_employees'] != 'none')
                    <x-sub-menu-item :link="route('employees.index')" :text="__('app.menu.employees')" />
                @endif
                @if (in_array('employees', user_modules()) &&
                        $sidebarUserPermissions['view_employees'] != 5 &&
                        $sidebarUserPermissions['view_employees'] != 'none')
                    <x-sub-menu-item :link="route('allocations.index')" :text="__('app.menu.allocations')" />
                @endif
                @if (in_array('leaves', user_modules()) &&
                        $sidebarUserPermissions['view_leave'] != 5 &&
                        $sidebarUserPermissions['view_leave'] != 'none')
                    <x-sub-menu-item :link="route('leaves.index')" :text="__('app.menu.leaves')" />
                @endif
                @if (in_array('attendance', user_modules()) &&
                        isset($sidebarUserPermissions['view_shift_roster']) &&
                        $sidebarUserPermissions['view_shift_roster'] != 5 &&
                        $sidebarUserPermissions['view_shift_roster'] != 'none')
                    <x-sub-menu-item :link="route('shifts.index')" :text="__('app.menu.shiftRoster')" />
                @endif
                @if (in_array('attendance', user_modules()) &&
                        $sidebarUserPermissions['view_attendance'] != 5 &&
                        $sidebarUserPermissions['view_attendance'] != 'none')
                    <x-sub-menu-item :link="route('attendances.index')" :text="__('app.menu.attendance')" />
                @endif
                @if (in_array('holidays', user_modules()) &&
                        $sidebarUserPermissions['view_holiday'] != 5 &&
                        $sidebarUserPermissions['view_holiday'] != 'none')
                    <x-sub-menu-item :link="route('holidays.index')" :text="__('app.menu.holiday')" />
                @endif
                @if (isset($sidebarUserPermissions['view_designation']) && $sidebarUserPermissions['view_designation'] == 4)
                    <x-sub-menu-item :link="route('designations.index')" :text="__('app.menu.designation')" />
                @endif
                @if (isset($sidebarUserPermissions['view_department']) && $sidebarUserPermissions['view_department'] == 4)
                    <x-sub-menu-item :link="route('departments.index')" :text="__('app.menu.department')" />
                @endif
                @if (isset($sidebarUserPermissions['view_appreciation']) && $sidebarUserPermissions['view_appreciation'] != 5)
                    <x-sub-menu-item :link="route('appreciations.index')" :text="__('app.menu.appreciation')" />
                @endif
                @if (isset($sidebarUserPermissions['view_appreciation']) &&
                        $sidebarUserPermissions['view_appreciation'] == 5 &&
                        isset($sidebarUserPermissions['manage_award']) &&
                        $sidebarUserPermissions['manage_award'] == 4)
                    <x-sub-menu-item :link="route('awards.index')" :text="__('app.menu.appreciation')" />
                @endif
                <!-- NAV ITEM - CUSTOM MODULES  -->
                @foreach ($worksuitePlugins as $item)
                    @includeIf(strtolower($item) . '::sections.hr.sidebar')
                @endforeach
            </div>
        </x-menu-item>
    @endif

    <!-- NAV ITEM - WORK COLLAPSE MENU -->
    @if (
        (in_array('contracts', user_modules()) ||
            in_array('projects', user_modules()) ||
            in_array('tasks', user_modules()) ||
            in_array('timelogs', user_modules())) &&
            ($sidebarUserPermissions['view_contract'] != 5 ||
                $sidebarUserPermissions['view_projects'] != 5 ||
                $sidebarUserPermissions['view_tasks'] != 5 ||
                $sidebarUserPermissions['view_timelogs'] != 5) &&
            ($sidebarUserPermissions['view_contract'] != 'none' ||
                $sidebarUserPermissions['view_projects'] != 'none' ||
                $sidebarUserPermissions['view_tasks'] != 'none' ||
                $sidebarUserPermissions['view_timelogs'] != 'none'))
        <x-menu-item icon="person-workspace" :text="__('app.menu.work')">

            <div class="accordionItemContent">
                @if (in_array('contracts', user_modules()) &&
                        $sidebarUserPermissions['view_contract'] != 5 &&
                        $sidebarUserPermissions['view_contract'] != 'none')
                    <x-sub-menu-item :link="route('contracts.index')" :text="__('app.menu.contracts')" />
                @endif
                @if (in_array('projects', user_modules()) &&
                        $sidebarUserPermissions['view_projects'] != 5 &&
                        $sidebarUserPermissions['view_projects'] != 'none')
                    <x-sub-menu-item :link="route('projects.index')" :text="__('app.menu.projects')" />
                @endif
                {{-- @if (!in_array('client', user_roles())) --}}
                @if (in_array('tasks', user_modules()) &&
                        $sidebarUserPermissions['view_tasks'] != 5 &&
                        $sidebarUserPermissions['view_tasks'] != 'none')
                    <x-sub-menu-item :link="route('tasks.index')" :text="__('app.menu.tasks')" />
                @endif
                @if (in_array('timelogs', user_modules()) &&
                        $sidebarUserPermissions['view_timelogs'] != 5 &&
                        $sidebarUserPermissions['view_timelogs'] != 'none')
                    <x-sub-menu-item :link="route('timelogs.index')" :text="__('app.menu.timeLogs')" />
                @endif
                {{-- @endif --}}
                <!-- NAV ITEM - CUSTOM MODULES  -->
                @foreach ($worksuitePlugins as $item)
                    @includeIf(strtolower($item) . '::sections.work.sidebar')
                @endforeach
            </div>
        </x-menu-item>
    @endif

    <!-- NAV ITEM - FINANCE COLLAPASE MENU -->
    @if (
        (in_array('estimates', user_modules()) ||
            in_array('invoices', user_modules()) ||
            in_array('payments', user_modules()) ||
            in_array('expenses', user_modules()) ||
            in_array('bankaccount', user_modules())) &&
            ($sidebarUserPermissions['view_estimates'] != 5 ||
                $sidebarUserPermissions['view_invoices'] != 5 ||
                $sidebarUserPermissions['view_payments'] != 5 ||
                $sidebarUserPermissions['view_expenses'] != 5 ||
                $sidebarUserPermissions['view_lead_proposals'] != 5 ||
                $sidebarUserPermissions['view_bankaccount'] != 5) &&
            ($sidebarUserPermissions['view_estimates'] != 'none' ||
                $sidebarUserPermissions['view_invoices'] != 'none' ||
                $sidebarUserPermissions['view_payments'] != 'none' ||
                $sidebarUserPermissions['view_expenses'] != 'none' ||
                $sidebarUserPermissions['view_lead_proposals'] != 'none' ||
                $sidebarUserPermissions['view_bankaccount'] != 'none'))
        <x-menu-item icon="currency-exchange" :active="($currentRouteName === 'payments.index')" :text="__('app.menu.finance')">

            <div class="accordionItemContent">
                @if (in_array('leads', user_modules()) &&
                        $sidebarUserPermissions['view_lead_proposals'] != 5 &&
                        $sidebarUserPermissions['view_lead_proposals'] != 'none')
                    <x-sub-menu-item :link="route('proposals.index')" :text="__('app.menu.proposal')" />
                @endif
                @if (in_array('estimates', user_modules()) &&
                        $sidebarUserPermissions['view_estimates'] != 5 &&
                        $sidebarUserPermissions['view_estimates'] != 'none')
                    <x-sub-menu-item :link="route('estimates.index')" :text="__('app.menu.estimates')" />
                @endif
                @if (in_array('invoices', user_modules()) &&
                        $sidebarUserPermissions['view_invoices'] != 5 &&
                        $sidebarUserPermissions['view_invoices'] != 'none')
                    <x-sub-menu-item :link="route('invoices.index')" :text="__('app.menu.invoices')" />
                @endif
                @if (in_array('payments', user_modules()) &&
                        $sidebarUserPermissions['view_payments'] != 5 &&
                        $sidebarUserPermissions['view_payments'] != 'none')
                    <x-sub-menu-item :link="route('payments.index')" :text="__('app.menu.payments')" />
                @endif
                @if (in_array('invoices', user_modules()) &&
                        $sidebarUserPermissions['view_invoices'] != 5 &&
                        $sidebarUserPermissions['view_invoices'] != 'none')
                    <x-sub-menu-item :link="route('creditnotes.index')" :text="__('app.menu.credit-note')" />
                @endif

                @if (in_array('expenses', user_modules()) &&
                        $sidebarUserPermissions['view_expenses'] != 5 &&
                        $sidebarUserPermissions['view_expenses'] != 'none')
                    <x-sub-menu-item :link="route('expenses.index')" :text="__('app.menu.expenses')" />
                @endif

                @if (in_array('bankaccount', user_modules()) &&
                        $sidebarUserPermissions['view_bankaccount'] != 5 &&
                        $sidebarUserPermissions['view_bankaccount'] != 'none')
                    <x-sub-menu-item :link="route('bankaccounts.index')" :text="__('app.menu.bankaccount')" />
                @endif
                <!-- NAV ITEM - CUSTOM MODULES  -->
                @foreach ($worksuitePlugins as $item)
                    @includeIf(strtolower($item) . '::sections.finance.sidebar')
                @endforeach
            </div>
        </x-menu-item>
    @endif

    <!-- NAV ITEM - PRODUCTS -->
    @if (
        !in_array('purchase', user_modules()) &&
            in_array('products', user_modules()) &&
            $sidebarUserPermissions['view_product'] != 5 &&
            $sidebarUserPermissions['view_product'] != 'none')
        <x-menu-item icon="archive-fill" :text="__('app.menu.products')" :link="route('products.index')">

        </x-menu-item>
    @endif

    <!-- NAV ITEM - PRODUCTS -->
    @if (in_array('orders', user_modules()) &&
            $sidebarUserPermissions['view_order'] != 5 &&
            $sidebarUserPermissions['view_order'] != 'none')
        <x-menu-item icon="cart-fill" :text="__('app.menu.orders')" :link="route('orders.index')">
            <x-slot name="iconPath">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </x-slot>
        </x-menu-item>
    @endif

    <!-- NAV ITEM - TICKETS -->
    @if (in_array('tickets', user_modules()) &&
            $sidebarUserPermissions['view_tickets'] != 5 &&
            $sidebarUserPermissions['view_tickets'] != 'none')
        <x-menu-item icon="headset" :text="__('app.menu.tickets')" :link="route('tickets.index')">

        </x-menu-item>
    @endif


    <!-- NAV ITEM - EVENTS -->
    @if (in_array('events', user_modules()) &&
            $sidebarUserPermissions['view_events'] != 5 &&
            $sidebarUserPermissions['view_events'] != 'none')
        <x-menu-item icon="calendar3-event-fill" :text="__('app.menu.events')" :link="route('events.index')">

        </x-menu-item>
    @endif

    <!-- NAV ITEM - MESSAGES -->
    @if (in_array('messages', user_modules()))
        @if (
            (message_setting()->allow_client_admin == 'yes' || message_setting()->allow_client_employee == 'yes') &&
                in_array('client', user_roles()))
            <x-menu-item class="message-menu" icon="chat-right-text-fill" :text="__('app.menu.messages')" :count="$unreadMessagesCount"
                :link="route('messages.index')">

            </x-menu-item>
        @elseif (in_array('employee', user_roles()))
            <x-menu-item class="message-menu" icon="chat-right-text-fill" :text="__('app.menu.messages')" :link="route('messages.index')"
                :count="$unreadMessagesCount">

            </x-menu-item>
        @endif
    @endif

    <!-- NAV ITEM - GDPR -->
    @if (in_array('client', user_roles()) && $gdpr->enable_gdpr)
        <x-menu-item icon="lock-fill" :text="__('app.menu.gdpr')" :link="route('gdpr.index')">

        </x-menu-item>
    @endif

    <!-- NAV ITEM - NOTICES -->
    @if (in_array('notices', user_modules()) &&
            $sidebarUserPermissions['view_notice'] != 5 &&
            $sidebarUserPermissions['view_notice'] != 'none')
        <x-menu-item icon="clipboard2-fill" :text="__('app.menu.noticeBoard')" :link="route('notices.index')">

        </x-menu-item>
    @endif

    <!-- Knowledge base -->
    @if (in_array('knowledgebase', user_modules()) &&
            isset($sidebarUserPermissions['view_knowledgebase']) &&
            $sidebarUserPermissions['view_knowledgebase'] != 5)
        <x-menu-item icon="book-fill" :text="__('app.menu.knowledgebase')" :link="route('knowledgebase.index')">

        </x-menu-item>
    @endif
    <!-- Knowledge base -->


    <!-- NAV ITEM - NOTES -->
    @if (in_array('client', user_roles()) && $sidebarUserPermissions['view_client_note'] != 5)
        <x-menu-item icon="journal-bookmark-fill" :text="__('app.menu.notes')" :link="route('client-notes.index')">

        </x-menu-item>
    @endif
    @if (checkCompanyPackageIsValid(user()->company_id))
        <!-- NAV ITEM - CUSTOM MODULES  -->
        @foreach ($worksuitePlugins as $item)
            @includeIf(strtolower($item) . '::sections.sidebar')
        @endforeach
    @endif
    <!-- NAV ITEM - NOTICES -->
    @if (in_array('reports', user_modules()) &&
            ($sidebarUserPermissions['view_task_report'] == 4 ||
                $sidebarUserPermissions['view_time_log_report'] == 4 ||
                (isset($sidebarUserPermissions['view_expense_report']) &&
                    $sidebarUserPermissions['view_expense_report'] == 4) ||
                $sidebarUserPermissions['view_finance_report'] != 5 ||
                $sidebarUserPermissions['view_income_expense_report'] == 4 ||
                $sidebarUserPermissions['view_leave_report'] != 5 ||
                $sidebarUserPermissions['view_attendance_report'] == 4 ||
                $sidebarUserPermissions['view_lead_report'] == 4 ||
                $sidebarUserPermissions['view_sales_report'] == 4) &&
            ($sidebarUserPermissions['view_task_report'] != 'none' ||
                $sidebarUserPermissions['view_time_log_report'] != 'none' ||
                $sidebarUserPermissions['view_finance_report'] != 'none' ||
                $sidebarUserPermissions['view_income_expense_report'] != 'none' ||
                $sidebarUserPermissions['view_leave_report'] != 'none' ||
                $sidebarUserPermissions['view_attendance_report'] != 'none' ||
                $sidebarUserPermissions['view_lead_report'] != 'none' ||
                $sidebarUserPermissions['view_sales_report'] != 'none' ||
                (isset($sidebarUserPermissions['view_expense_report']) &&
                    $sidebarUserPermissions['view_expense_report'] != 'none')))
        <x-menu-item icon="bar-chart-fill" :text="__('app.menu.reports')">


            <div class="accordionItemContent">
                @if (
                    $sidebarUserPermissions['view_task_report'] == 4 &&
                        $sidebarUserPermissions['view_task_report'] != 'none' &&
                        in_array('tasks', user_modules()))
                    <x-sub-menu-item :link="route('task-report.index')" :text="__('app.menu.taskReport')" />
                @endif

                @if (
                    $sidebarUserPermissions['view_time_log_report'] == 4 &&
                        $sidebarUserPermissions['view_time_log_report'] != 'none' &&
                        in_array('timelogs', user_modules()))
                    <x-sub-menu-item :link="route('time-log-report.index')" :text="__('app.menu.timeLogReport')" />
                @endif

                @if (
                    $sidebarUserPermissions['view_finance_report'] != 5 &&
                        $sidebarUserPermissions['view_finance_report'] != 'none' &&
                        in_array('payments', user_modules()))
                    <x-sub-menu-item :link="route('finance-report.index')" :text="__('app.menu.financeReport')" />
                @endif

                @if (
                    $sidebarUserPermissions['view_income_expense_report'] == 4 &&
                        $sidebarUserPermissions['view_income_expense_report'] != 'none' &&
                        in_array('expenses', user_modules()))
                    <x-sub-menu-item :link="route('income-expense-report.index')" :text="__('app.menu.incomeVsExpenseReport')" />
                @endif

                @if (
                    $sidebarUserPermissions['view_leave_report'] != 5 &&
                        $sidebarUserPermissions['view_leave_report'] != 'none' &&
                        in_array('leaves', user_modules()))
                    <x-sub-menu-item :link="route('leave-report.index')" :text="__('app.menu.leaveReport')" />
                @endif

                @if (
                    $sidebarUserPermissions['view_attendance_report'] == 4 &&
                        $sidebarUserPermissions['view_attendance_report'] != 'none' &&
                        in_array('attendance', user_modules()))
                    <x-sub-menu-item :link="route('attendance-report.index')" :text="__('app.menu.attendanceReport')" />
                @endif
                @if (isset($sidebarUserPermissions['view_expense_report']) &&
                        $sidebarUserPermissions['view_expense_report'] == 4 &&
                        $sidebarUserPermissions['view_expense_report'] != 'none' &&
                        in_array('expenses', user_modules()))
                    <x-sub-menu-item :link="route('expense-report.index')" :text="__('app.menu.expenseReport')" />
                @endif
                @if (isset($sidebarUserPermissions['view_lead_report']) &&
                        $sidebarUserPermissions['view_lead_report'] == 4 &&
                        $sidebarUserPermissions['view_lead_report'] != 'none' &&
                        in_array('leads', user_modules()))
                    <x-sub-menu-item :link="route('lead-report.index')" :text="__('app.menu.dealReport')" />
                @endif
                @if (isset($sidebarUserPermissions['view_sales_report']) &&
                        $sidebarUserPermissions['view_sales_report'] == 4 &&
                        $sidebarUserPermissions['view_sales_report'] != 'none' &&
                        in_array('invoices', user_modules()))
                    <x-sub-menu-item :link="route('sales-report.index')" :text="__('app.menu.salesReport')" />
                @endif
            </div>
        </x-menu-item>
    @endif

    <!-- NAV ITEM - CUSTOM LINK -->

    @php
        $role = user()->role->last();
    @endphp

    @foreach ($customLink as $item)
        @if (
            (in_array($role->role_id, json_decode($item->can_be_viewed_by)) || in_array('admin', user_roles())) &&
                $item->status == 'active')
            <li>
                <a class="nav-item text-lightest f-15 sidebar-text-color" href={{ $item->url }} target="_blank"
                    title={{ $item->link_title }}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-link" viewBox="0 0 16 16">
                        <path
                            d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                        <path
                            d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z" />
                    </svg>
                    <span class="pl-3">{{ $item->link_title }}</span>
                </a>
            </li>
        @endif
    @endforeach

    <!-- NAV ITEM - REPORTS COLLAPASE MENU -->
    <!-- NAV ITEM - SETTINGS -->
    <x-menu-item icon="gear-fill" :text="__('app.menu.settings')" :link="$sidebarUserPermissions['manage_company_setting'] == 4
        ? route('company-settings.index')
        : route('profile-settings.index')">

    </x-menu-item>

    @if (isWorksuiteSaas())
        @if (in_array('admin', user_roles()))
            <div class="d-block d-lg-none d-xl-none">
                <x-menu-item icon="question-diamond-circle" :text="__('app.menu.help')" :link="route('superadmin.faqs.index')">

                </x-menu-item>
            </div>
        @endif
    @endif


</ul>
